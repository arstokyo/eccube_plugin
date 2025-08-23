<?php

namespace Plugin\AceClient43\EventListener;

use Eccube\Entity\Customer;
use Plugin\AceClient43\Bridge\CustomerBridge;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Service\CartControllerService;
use Plugin\AceClient43\Traits\GetUserTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

class KernelControllerListener implements EventSubscriberInterface
{
    use GetUserTrait;

    private CartControllerService $cartControllerService;

    private AceConfigService $aceConfigService;

    private CustomerBridge $customerBridge;

    public function __construct(
        CartControllerService $cartControllerService,
        AceConfigService $aceConfigService,
        CustomerBridge $customerBridge,
    ) {
        $this->cartControllerService = $cartControllerService;
        $this->aceConfigService = $aceConfigService;
        $this->customerBridge = $customerBridge;
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.controller' => 'onKernelController',
        ];
    }

    /**
     * @throws CouldNotAddCartException
     */
    public function onKernelController(ControllerEvent $event): void
    {
        $route = $event->getRequest()->attributes->get('_route');

        if (!$route) {
            return;
        }

        if ($route === 'cart' && $this->aceConfigService->shouldAddCartIndex()) {
            $this->cartControllerService->addCart();

            return;
        }

        $customer = $this->getUser();
        if (!$customer instanceof Customer) {
            return;
        }

        if ($this->aceConfigService->shouldSyncCustomerRoute($route)) {
            $options = $this->aceConfigService->getCustomerSyncOptions($route);
            $this->customerBridge->syncCustomerFromAce($customer, true, $options);
        }
    }
}
