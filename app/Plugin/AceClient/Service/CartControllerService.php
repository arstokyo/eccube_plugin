<?php

namespace Plugin\AceClient43\Service;

use Eccube\Service\CartService;
use Plugin\AceClient43\Bridge\CartBridge;
use Plugin\AceClient43\Events\CartControllerServicePreAddCart;
use Plugin\AceClient43\Events\Events;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Traits\GetUserTrait;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class CartControllerService
{
    use GetUserTrait;

    private CartBridge $cartBridge;

    private CartService $cartService;

    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        CartService $cartService,
        CartBridge $cartBridge,
        EventDispatcherInterface $eventDispatcher,
    ) {
        $this->cartBridge = $cartBridge;
        $this->cartService = $cartService;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * 通販Aceのカートに商品を追加します。
     *
     * @throws CouldNotAddCartException
     */
    public function addCart(): void
    {
        // 非会員の場合は処理を中止
        if (!$this->isUserAuthenticated()) {
            return;
        }

        log_info('[ACECLIENT-CART_CONTROLLER_SERVICE] 通販Aceのカートに商品を追加します。');

        $Carts = $this->cartService->getCarts(false, true);
        $Cart = current($Carts);

        // カートが空であるか、顧客が未設定の場合は処理を中止
        if (!$Cart || $Cart->getCartItems()->isEmpty() || null === $Customer = $Cart->getCustomer()) {

            return;
        }

        $options = [
            '_trigger' => CartControllerService::class,
            '_can_flush' => false,
        ];

        if ($this->eventDispatcher->hasListeners(Events::CART_CONTROLLER_SERVICE_PRE_ADD_CART)) {
            $event = new CartControllerServicePreAddCart(
                $Carts,
                $Cart,
                $Customer,
                $options
            );

            $this->eventDispatcher->dispatch($event, Events::CART_CONTROLLER_SERVICE_PRE_ADD_CART);

            if ($event->shouldSkip) {
                log_warning('[ACECLIENT-CART_CONTROLLER_SERVICE] 通販AceのAddCart処理がスキップされました。');

                return;
            }

            $options = $event->options;
            $Cart = $event->currentCart;
        }

        try {
            $this->cartBridge->add($Cart, $options['_can_flush'], $options);
        } catch (\Throwable $e) {
            if ($e instanceof CouldNotAddCartException) {
                log_error('[ACECLIENT-CART_CONTROLLER_SERVICE] 通販Aceのカート追加に失敗しました。', ['exception' => $e]);
                throw $e;
            }

            log_error('[ACECLIENT-CART_CONTROLLER_SERVICE] 通販Aceのカート追加に失敗しました。', ['exception' => $e]);
            throw new CouldNotAddCartException('通販Aceのカート追加に失敗しました。', $e);
        }
    }
}
