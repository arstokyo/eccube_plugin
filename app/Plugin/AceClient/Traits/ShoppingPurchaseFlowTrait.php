<?php

namespace Plugin\AceClient43\Traits;

use Doctrine\Common\Annotations\Annotation\Required;
use Eccube\Entity\Order;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Eccube\Service\PurchaseFlow\PurchaseFlowResult;
use Plugin\AceClient43\Processor\Context\UpdateDeliveryFeePurchaseContext;
use Plugin\AceClient43\Processor\Context\UpdateEarnablePointPurchaseContext;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * 共通のショッピングPurchaseFlow実行処理を提供するトレイト.
 *
 * このトレイトを利用するクラスは:
 * - protected PurchaseFlow $purchaseFlow; を持つこと（または同名のプロパティにバインド）
 * - getUser(): ?UserInterface を提供すること
 */
trait ShoppingPurchaseFlowTrait
{
    /**
     * 現在ログイン中のユーザーを返す（実装側で提供）
     */
    abstract protected function getUser(): ?UserInterface;

    /**
     * @Required
     */
    public function setShoppingPurchaseFlow(PurchaseFlow $shoppingPurchaseFlow): void
    {
        // 利用側クラスが purchaseFlow プロパティを保持している前提
        $this->purchaseFlow = $shoppingPurchaseFlow;
    }

    /**
     * ショッピング購入フローを実行する.
     *
     * @param Order $order 対象の Order エンティティ
     * @param string $flowType 'delivery_update' | 'point_update' | 'default'
     * @param bool $shouldExecute 実行フラグ（false の場合は null）
     *
     * @return PurchaseFlowResult|null
     */
    protected function executeShoppingPurchaseFlow(Order $order, string $flowType = 'default', bool $shouldExecute = true): ?PurchaseFlowResult
    {
        if (!$shouldExecute) {
            return null;
        }

        if (!isset($this->purchaseFlow)) {
            throw new \LogicException('PurchaseFlow service is not available on '.static::class);
        }

        $customer = $this->getUser();

        // 検証対象は実体の Order。コンテキストには clone を渡す（他箇所と整合）
        switch ($flowType) {
            case 'delivery_update':
                $context = new UpdateDeliveryFeePurchaseContext(clone $order, $customer);
                break;
            case 'point_update':
                $context = new UpdateEarnablePointPurchaseContext(clone $order, $customer);
                break;
            default:
                $context = new PurchaseContext(clone $order, $customer);
                break;
        }

        return $this->purchaseFlow->validate($order, $context);
    }
}
