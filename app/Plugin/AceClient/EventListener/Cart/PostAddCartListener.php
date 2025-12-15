<?php

namespace Plugin\AceClient43\EventListener\Cart;

use Doctrine\ORM\EntityManagerInterface;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Events\PostAddCartEvent;
use Plugin\AceClient43\Synchronizer\AceCartResponseToCartSynchronizerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PostAddCartListener implements EventSubscriberInterface
{
    protected AceCartResponseToCartSynchronizerInterface $synchronizer;

    protected EntityManagerInterface $entityManager;

    public function __construct(
        AceCartResponseToCartSynchronizerInterface $synchronizer,
        EntityManagerInterface $entityManager,
    ) {
        $this->synchronizer = $synchronizer;
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            Events::POST_ADD_CART => ['onPostAddCart', -24],  // できるだけ最後に実行
        ];
    }

    public function onPostAddCart(PostAddCartEvent $event): void
    {
        $responseObject = $event->getAddCartResponseModel();
        $cart = $event->getCart();
        $options = $event->getOptions();

        // カート明細を同期
        $this->synchronizer->syncCartItems($cart, $responseObject->getOrder(), $options);

        // 手数料・料金を同期
        $this->synchronizer->syncCartFees($cart, $responseObject->getOrder());

        $this->entityManager->persist($cart);

        if ($event->canFlush()) {
            $this->entityManager->flush();
        }

        $event->setOptions($options);
    }
}
