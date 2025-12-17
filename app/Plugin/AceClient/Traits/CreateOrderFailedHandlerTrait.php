<?php

namespace Plugin\AceClient43\Traits;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Order;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Plugin\AceClient43\Bridge\OrderBridge;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Symfony\Component\HttpFoundation\RedirectResponse;

trait CreateOrderFailedHandlerTrait
{
    use FlashBagAwareTrait;
    use AddShoppingErrorFlashTrait;

    private OrderBridge $orderBridge;

    public function handleWhenCreateOrderFailed(Order $order, \Throwable $exception, ?callable $preRollback = null): ?RedirectResponse
    {
        if ($exception instanceof CouldNotCreateOrderException) {
            return $this->handleCouldNotCreateOrderException($exception, $order, $preRollback);
        }

        return $this->handleUnexpectedException($exception, $order, $preRollback);
    }

    public function handleCouldNotCreateOrderException(CouldNotCreateOrderException $exception, Order $order, ?callable $preRollback = null): ?RedirectResponse
    {
        if ($exception->isAddCartError()) {
            log_warning('['.$order->getId().'] 通販Aceに受注作成する際に、AddCartのエラーが発生しました。ショッピング画面に戻ります。エラー：'.$exception->getUserMessage(), [
                'message' => $exception->getMessage(),
                'stackTrace' => $exception->getTraceAsString(),
            ]);

            $this->addShoppingErrorFlash($exception->getUserMessage());
            $this->rollback($order, $preRollback);

            return $this->redirectToRoute('shopping');
        }

        if (null === $aceOrderId = $this->orderBridge->getAceOrderId($order->getId())) {
            log_error('['.$order->getId().'] 通販Ace側に受注データを記録失敗しましたため、受注処理をRollbackします。', [
                'message' => $exception->getMessage(),
                'stackTrace' => $exception->getTraceAsString(),
            ]);

            $this->addShoppingErrorFlash(trans('ace_client.create_order.error.unexpected'));
            $this->rollback($order, $preRollback);

            return $this->redirectToRoute('shopping_error');
        }

        log_warning('通販Ace側に受注データを記録成功したため、そのまま注文完了処理を続けます。', [
            'ace_order_id' => $aceOrderId,
            'ec_order_id' => $order->getId(),
        ]);

        return null;
    }

    public function handleUnexpectedException(\Throwable $exception, Order $order, ?callable $onRollback = null): ?RedirectResponse
    {
        if (null === $aceOrderId = $this->orderBridge->getAceOrderId($order->getId())) {
            log_error('['.$order->getId().'] 通販Ace側に受注データを記録失敗しましたため、受注処理をRollbackします。', [
                'message' => $exception->getMessage(),
                'stackTrace' => $exception->getTraceAsString(),
            ]);

            $this->addShoppingErrorFlash(trans('ace_client.create_order.error.unexpected'));
            $this->rollback($order, $onRollback);

            return $this->redirectToRoute('shopping_error');
        }

        log_warning('['.$order->getId().'] 通販Ace側に受注データを記録成功したため、そのまま注文完了処理を続けます。', [
            'ace_order_id' => $aceOrderId,
            'ec_order_id' => $order->getId(),
        ]);

        return null;
    }

    private function rollback(Order $order, ?callable $preRollback = null): void
    {
        if ($preRollback) {
            $preRollback($order);
        }
        $this->purchaseFlow->rollback($order, new PurchaseContext());
        $this->entityManager->flush();
    }

    abstract protected function redirectToRoute(string $route, array $parameters = [], int $status = 302): RedirectResponse;

    /**
     * @Required
     */
    public function setOrderBridge(OrderBridge $orderBridge): void
    {
        $this->orderBridge = $orderBridge;
    }

    /**
     * @Required
     */
    public function setPurchaseFlow(PurchaseFlow $shoppingPurchaseFlow): void
    {
        $this->purchaseFlow = $shoppingPurchaseFlow;
    }

    /**
     * @required
     */
    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }
}
