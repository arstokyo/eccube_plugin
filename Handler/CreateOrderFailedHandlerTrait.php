<?php

namespace Plugin\AceClient43\Handler;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Entity\Order;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Eccube\Service\PurchaseFlow\PurchaseFlow;
use Plugin\AceClient43\Bridge\OrderBridge;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Contracts\Service\Attribute\Required;

trait CreateOrderFailedHandlerTrait
{
    private OrderBridge $orderBridge;

    private PurchaseFlow $shoppingPurchaseFlow;

    public function handleWhenCreateOrderFailed(Order $order, \Throwable $exception, ?callable $onRollback = null): ?RedirectResponse
    {
        if ($exception instanceof CouldNotCreateOrderException) {
            return $this->handleCouldNotCreateOrderException($exception, $order, $onRollback);
        }

        return $this->handleUnknownException($exception, $order, $onRollback);
    }

    public function handleCouldNotCreateOrderException(CouldNotCreateOrderException $exception, Order $order, ?callable $onRollback = null): ?RedirectResponse
    {
        if ($exception->isAddCartError()) {
            log_warning('['.$order->getId().'] 通販Aceに受注作成する際に、AddCartのエラーが発生しました。ショッピング画面に戻ります。エラー：'.$exception->getUserMessage(), [
                'message' => $exception->getMessage(),
                'stackTrace' => $exception->getTraceAsString(),
            ]);

            return $this->redirectToRoute('shopping');
        }

        if (null === $aceOrderId = $this->orderBridge->getAceOrderId($order->getId())) {
            log_error('['.$order->getId().'] 通販Ace側に受注データを記録失敗しましたため、受注処理をRollbackします。', [
                'message' => $exception->getMessage(),
                'stackTrace' => $exception->getTraceAsString(),
            ]);

            $this->rollback($order, $onRollback);

            return $this->redirectToRoute('shopping_error');
        }

        log_warning('通販Ace側に受注データを記録成功したため、そのまま注文完了処理を続けます。', [
            'ace_order_id' => $aceOrderId,
            'ec_order_id' => $order->getId(),
        ]);

        return null;
    }

    public function handleUnknownException(\Throwable $exception, Order $order, ?callable $onRollback = null): ?RedirectResponse
    {
        // 1: check if ace has our oder
        if (null === $aceOrderId = $this->orderBridge->getAceOrderId($order->getId())) {
            log_error('['.$order->getId().'] 通販Ace側に受注データを記録失敗しましたため、受注処理をRollbackします。', [
                'message' => $exception->getMessage(),
                'stackTrace' => $exception->getTraceAsString(),
            ]);

            $this->rollback($order, $onRollback);

            return $this->redirectToRoute('shopping_error');
        }

        log_warning('['.$order->getId().'] 通販Ace側に受注データを記録成功したため、そのまま注文完了処理を続けます。', [
            'ace_order_id' => $aceOrderId,
            'ec_order_id' => $order->getId(),
        ]);

        return null;
    }

    private function rollback(Order $order, ?callable $onRollback = null): void
    {
        $this->shoppingPurchaseFlow->rollback($order, new PurchaseContext());
        if ($onRollback) {
            $onRollback($order);
        }
        $this->entityManager->flush();
    }

    abstract protected function redirectToRoute(string $route, array $parameters = [], int $status = 302): RedirectResponse;

    abstract protected function addError(string $message, $namespace = 'front');

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
        $this->shoppingPurchaseFlow = $shoppingPurchaseFlow;
    }

    /**
     * @required
     */
    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }
}
