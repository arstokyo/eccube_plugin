<?php

namespace Plugin\AceClient43\EventListener;

use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Plugin\AceClient43\Repository\ConfigRepository;
use Plugin\AceClient43\Service\CartControllerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

class KernelControllerListener implements EventSubscriberInterface
{
    private CartControllerService $cartControllerService;

    private Config $config;

    public function __construct(
        CartControllerService $cartControllerService,
        ConfigRepository $configRepository,
    ) {
        $this->cartControllerService = $cartControllerService;
        $this->config = $configRepository->get();
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

        if ($route === 'cart' && $this->config->shouldAddCartIndex()) {
            $this->cartControllerService->addCart();
        }
    }
}
