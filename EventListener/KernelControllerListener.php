<?php

namespace Plugin\AceClient43\EventListener;

use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Service\CartControllerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

class KernelControllerListener implements EventSubscriberInterface
{
    private CartControllerService $cartControllerService;

    private AceConfigService $aceConfigService;

    public function __construct(
        CartControllerService $cartControllerService,
        AceConfigService $aceConfigService,
    ) {
        $this->cartControllerService = $cartControllerService;
        $this->aceConfigService = $aceConfigService;
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

        if ($route === 'cart' && $this->aceConfigService->shouldAddCartIndex()) {
            $this->cartControllerService->addCart();
        }
    }
}
