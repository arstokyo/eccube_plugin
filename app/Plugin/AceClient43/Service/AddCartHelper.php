<?php

namespace Plugin\AceClient43\Service;

use Eccube\Entity\Cart;
use Eccube\Repository\ProductClassRepository;
use Eccube\Service\CartService;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\JyumeiModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\OrderModelInterface;

class AddCartHelper
{
    protected CartService $cartService;

    protected ProductClassRepository $productClassRepository;

    public function __construct(
        CartService $cartService,
        ProductClassRepository $productClassRepository,
    ) {
        $this->cartService = $cartService;
        $this->productClassRepository = $productClassRepository;
    }

    /**
     * カート情報を同期する
     *
     * @param Cart $Cart
     * @param OrderModelInterface $orderModel
     * @param $options
     *
     * @return void
     */
    public function syncCart(Cart $Cart, OrderModelInterface $orderModel, &$options): void
    {
        $foundProductCodes = [];
        $anySync = false;

        /** @var JyumeiModelInterface $jyumei */
        foreach ($orderModel->getJyumei() as $jyumei) {
            if (!$jyumei->isProduct()) {
                // 商品ではない場合はスキップ
                continue;
            }

            $productCode = $jyumei->getGcode();
            foreach ($Cart->getCartItems() as $cartItem) {
                $ProductClass = $cartItem->getProductClass();

                if ($ProductClass->getAceProductId() == $productCode) {
                    // 商品が見つかった場合、数量を更新
                    $anySync = true;
                    $foundProductCodes[] = $productCode;
                    $cartItem->setQuantity($jyumei->getSuu());
                    $cartItem->setPrice($jyumei->getTintanka());

                    continue 2; // 内側のループを抜けて外側のループへ
                }
            }

            // 商品が見つからなかった場合、新しいカートアイテムを追加
            $newProductClass = $this->productClassRepository->findOneBy(['ace_product_id' => $productCode]);
            if (!$newProductClass) {
                log_warning('[AddCartHelper] 通販Aceから取得した商品コードがEC側に存在しません: '.$productCode);

                // 商品クラスが見つからない場合はスキップ
                continue;
            }

            $foundProductCodes[] = $productCode;

            $options = [
                '_trigger' => AddCartHelper::class,
                'jyumei_model' => $jyumei,
            ];

            $this->cartService->addProduct($newProductClass, $jyumei->getSuu(), $options);
            $anySync = true;
        }

        $Cart = $this->cartService->getCart();
        // カートアイテムの中で、jyumeiに存在しないものを削除
        $notFoundItems = [];
        foreach ($Cart->getCartItems() as $cartItem) {
            $ProductClass = $cartItem->getProductClass();
            if (!in_array($ProductClass->getAceProductId(), $foundProductCodes, true)) {
                $anySync = true;
                $notFoundItems[] = $cartItem;
                $removeOptions['cart_item_data'] = $cartItem;

                $this->cartService->removeProduct($ProductClass, $removeOptions);
            }
        }

        if (count($notFoundItems) > 0) {
            log_warning('[AddCartHelper] カートに商品が存在しますが、通販Aceのレスポンスに存在しません: '.implode(', ', array_map(function ($item) { return $item->getProductClass()->getAceProductId(); }, $notFoundItems)));

            $options['_add_cart_helper.not_found_items'] = $notFoundItems;
        }

        if ($anySync) {
            log_info('[AddCartHelper] カートの同期が完了しました。');
        } else {
            log_info('[AddCartHelper] カートの同期は行われませんでした。');
        }
    }
}
