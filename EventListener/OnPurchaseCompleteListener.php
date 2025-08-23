<?php

namespace Plugin\AceClient43\EventListener;

use Plugin\AceClient43\Bridge\OrderBridge;
use Plugin\AceClient43\Events\EccubeEvents\Events;
use Plugin\AceClient43\Events\EccubeEvents\OnPurchaseCompleteEvent;
use Plugin\AceClient43\Exception\CouldNotCreateOrderException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class OnPurchaseCompleteListener implements EventSubscriberInterface
{
    protected OrderBridge $orderBridge;

    public function __construct(
        OrderBridge $orderBridge,
    ) {
        $this->orderBridge = $orderBridge;
    }

    public static function getSubscribedEvents()
    {
        return [
            Events::ON_PURCHASE_COMPLETE => ['onComplete', 100],
        ];
    }

    /**
     * @throws CouldNotCreateOrderException
     */
    public function onComplete(OnPurchaseCompleteEvent $event): void
    {
        $Order = $event->Order;

        foreach ($Order->getShippings() as $Shipping) {
            try {
                $this->orderBridge->create($Shipping);
            } catch (\Throwable $e) {
                log_error('[注文処理] 注文処理中にエラーが発生しました.', [$e->getMessage()]);

                throw new CouldNotCreateOrderException('通販Aceの注文処理中にエラーが発生しました.', $e);
            }
        }
    }
}
