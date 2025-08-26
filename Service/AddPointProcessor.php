<?php

namespace Plugin\AceClient43\Service;

use Eccube\Entity\ItemHolderInterface;
use Eccube\Entity\Order;
use Eccube\Service\PurchaseFlow\ItemHolderPostValidator;
use Eccube\Service\PurchaseFlow\PurchaseContext;

/**
 * ACE加算ポイントプロセッサ
 *
 * 設定が有効な場合、Cartに保存されたACEの付与予定ポイントで Order::setAddPoint を上書きします。
 * ポイント算出自体はデフォルトプロセッサに委ねるため、本クラスは「上書きのみ」を行います。
 */
class AddPointProcessor extends ItemHolderPostValidator
{
    private AceConfigService $aceConfigService;

    public function __construct(
        AceConfigService $aceConfigService,
    ) {
        // BaseInfoRepository は互換のため残すが、本クラスでは使用しない
        $this->aceConfigService = $aceConfigService;
    }

    /**
     * {@inheritdoc}
     */
    public function validate(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        if (!$this->supports($itemHolder)) {
            return;
        }

        $aceAddPoint = (float) $itemHolder->getAceEarnablePoint();

        // EC-CUBEのAddPointは整数のため、四捨五入で反映
        $itemHolder->setAddPoint((int) round($aceAddPoint));
    }

    /**
     * 実行可能チェック
     * - ACE設定で「自動加算ポイントを使用」が有効
     * - Order のみ対象（会員チェックはデフォルト側に委譲）
     */
    private function supports(ItemHolderInterface $itemHolder): bool
    {
        if (!$this->aceConfigService->shouldAddPoint()) {
            return false;
        }

        return $itemHolder instanceof Order;
    }
}
