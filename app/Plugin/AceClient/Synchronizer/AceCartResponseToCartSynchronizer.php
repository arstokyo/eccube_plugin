<?php

namespace Plugin\AceClient43\Synchronizer;

use Eccube\Entity\Cart;
use Eccube\Entity\CartItem;
use Eccube\Repository\ProductClassRepository;
use Eccube\Service\CartService;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\JyumeiModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\OrderModelInterface;
use Plugin\AceClient43\Comparator\ItemCompareInterface;
use Plugin\AceClient43\Service\AceConfigService;

/**
 * 通販Aceのカート同期ヘルパー（差分適用対応）
 *
 * 目的:
 * - 同期時に大量の DELETE/INSERT を伴う再構築（restoreCarts）を避け、明細の差分更新を行う。
 * - これにより、ロック競合/デッドロックのリスクと書き込み負荷を下げ、パフォーマンスを改善する。
 *
 * 変更点:
 * - addProduct/removeProduct 呼び出し時に options['skip_restore_cart']=true を付与し、
 *   デコレータ側で「in-place」更新（差分適用）を選択できるようにする。
 */
class AceCartResponseToCartSynchronizer implements AceCartResponseToCartSynchronizerInterface
{
    protected CartService $cartService;

    protected ProductClassRepository $productClassRepository;

    protected ItemCompareInterface $itemCompare;

    protected AceConfigService $aceConfigService;

    public function __construct(
        CartService $cartService,
        ProductClassRepository $productClassRepository,
        ItemCompareInterface $itemCompare,
        AceConfigService $aceConfigService,
    ) {
        $this->cartService = $cartService;
        $this->productClassRepository = $productClassRepository;
        $this->itemCompare = $itemCompare;
        $this->aceConfigService = $aceConfigService;
    }

    /**
     * {@inheritDoc}
     */
    public function syncCartItems(Cart $Cart, OrderModelInterface $orderModel, array &$options): void
    {
        $excludeFromSync = $options['exclude_from_sync'] ?? [];
        $foundProductCodes = [];
        $anySync = false;

        /** @var JyumeiModelInterface $jyumei */
        foreach ($orderModel->getJyumei() as $jyumei) {
            if (!$jyumei->isProduct()) {
                // 商品ではない場合はスキップ
                continue;
            }

            $productCode = $jyumei->getGcode();
            $matchedCartItem = null;

            // 既存のカートアイテムで商品コードとカスタムフィールドが一致するものを探す
            foreach ($Cart->getCartItems() as $cartItem) {
                // 比較ロジックはカスタマイズ実装へ委譲（商品同一性＋拡張属性）
                if ($this->itemCompare->compareCartItemWithJyumei($cartItem, $jyumei)) {
                    // 完全一致の場合、数量/価格を更新
                    $anySync = true;
                    $foundProductCodes[] = $productCode;

                    $cartItem->setQuantity($jyumei->getSuuAsString());
                    $cartItem->setPrice($jyumei->getPreferTintankaAsString());
                    $cartItem->setDirty(false);
                    $cartItem->skipMarkDirty = true;

                    $matchedCartItem = $cartItem;
                    break;
                }
            }

            if ($matchedCartItem === null) {
                // 一致するカートアイテムが見つからなかった場合、新しいカートアイテムを追加
                $newProductClass = $this->productClassRepository->findOneBy(['ace_product_id' => $productCode]);
                if (!$newProductClass) {
                    log_warning('[AddCartHelper] 通販Aceから取得した商品コードがEC側に存在しません: '.$productCode);

                    // 商品クラスが見つからない場合はスキップ
                    continue;
                }

                $foundProductCodes[] = $productCode;

                // JyumeiModelからCartItemデータを作成
                $cartItemData = $this->createCartItemFromJyumei($jyumei);

                $options = [
                    '_trigger' => self::class,
                    'cart_item_data' => $cartItemData,
                    // 差分適用（restoreCartsをスキップ）で追加する
                    'skip_restore_cart' => true,
                ];

                if ($this->cartService->addProduct($newProductClass, $jyumei->getSuu(), $options)) {
                    $anySync = true;
                }
            }
        }

        // カートアイテムの中で、jyumeiに存在しないものを削除
        // ただし、exclude_from_syncに含まれる商品コードは削除しない
        $notFoundItems = [];
        foreach ($Cart->getCartItems() as $cartItem) {
            $ProductClass = $cartItem->getProductClass();
            $productCode = $ProductClass->getAceProductId();

            if (!in_array($productCode, $foundProductCodes, true) && !in_array($productCode, $excludeFromSync, true)) {
                $notFoundItems[] = $cartItem;
                $removeOptions['cart_item_data'] = $cartItem;
                // 差分適用（restoreCartsをスキップ）で削除する
                $removeOptions['skip_restore_cart'] = true;

                if ($this->cartService->removeProduct($ProductClass, $removeOptions)) {
                    $anySync = true;
                }
            }
        }

        if (count($notFoundItems) > 0) {
            log_warning('[AddCartHelper] カートに商品が存在しますが、通販Aceのレスポンスに存在しません: '.implode(', ', array_map(function ($item) { return $item->getProductClass()->getAceProductId(); }, $notFoundItems)));

            $options['_add_cart_helper.not_found_items'] = $notFoundItems;
        }

        if (!empty($excludeFromSync)) {
            log_info('[AddCartHelper] 同期から除外された商品コード: '.implode(', ', $excludeFromSync));
        }

        if ($anySync) {
            log_info('[AddCartHelper] カートの同期が完了しました。');
        } else {
            log_info('[AddCartHelper] カートの同期は行われませんでした。');
        }
    }

    public function syncCartFees(Cart $Cart, OrderModelInterface $orderModel): void
    {
        if ($this->aceConfigService->shouldUseAceDelivery()) {
            $deliveryFree = $orderModel->getJyuden()->getSouryou();
            $Cart->setAceDeliveryFee($deliveryFree);
        }

        if ($this->aceConfigService->shouldUseAceCharge()) {
            $chargeFee = $orderModel->getJyuden()->getTesuu();
            $Cart->setAceChargeFee($chargeFee);
        }

        if ($this->aceConfigService->shouldAddPoint()) {
            $Cart->setAceEarnablePoint($orderModel->getEarnablePoints());
        }

        if ($this->aceConfigService->shouldUseAceDiscount()) {
            $discountAmount = $orderModel->getPromotionDiscount();
            $Cart->setAcePromotionDiscount($discountAmount);
        }
    }

    /**
     * JyumeiModelからCartItemを作成する
     *
     * @param JyumeiModelInterface $jyumei
     *
     * @return CartItem
     */
    protected function createCartItemFromJyumei(JyumeiModelInterface $jyumei): CartItem
    {
        $cartItem = new CartItem();

        // isPresentを設定
        $cartItem->setIsPresent($jyumei->isPresent());

        // 税抜単価と税込単価を設定（DBのdecimalと一致するよう文字列へ正規化）
        $cartItem->setPrice($jyumei->getPreferTintankaAsString());

        $cartItem->setDirty(false);

        return $cartItem;
    }
}
