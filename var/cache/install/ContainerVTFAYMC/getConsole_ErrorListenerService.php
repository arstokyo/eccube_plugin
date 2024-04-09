<?php

namespace ContainerVTFAYMC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_ErrorListenerService extends Eccube_KernelInstallContainer
{
    /*
     * Gets the private 'console.error_listener' shared service.
     *
     * @return \Symfony\Component\Console\EventListener\ErrorListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/EventListener/ErrorListener.php';

        $a = new \Symfony\Bridge\Monolog\Logger('console');
        $a->pushProcessor(($container->privates['Eccube\\Log\\Processor\\SessionProcessor'] ?? $container->getSessionProcessorService()));
        $a->pushProcessor(($container->privates['Eccube\\Log\\Processor\\TokenProcessor'] ?? $container->getTokenProcessorService()));
        $a->pushProcessor(($container->privates['Monolog\\Processor\\UidProcessor'] ?? ($container->privates['Monolog\\Processor\\UidProcessor'] = new \Monolog\Processor\UidProcessor())));
        $a->pushProcessor(($container->privates['Monolog\\Processor\\IntrospectionProcessor'] ?? ($container->privates['Monolog\\Processor\\IntrospectionProcessor'] = new \Monolog\Processor\IntrospectionProcessor(100, [0 => 'Eccube\\\\Log', 1 => 'Psr\\\\Log']))));
        $a->pushProcessor(($container->privates['Symfony\\Bridge\\Monolog\\Processor\\WebProcessor'] ?? $container->getWebProcessorService()));
        $a->pushHandler(($container->privates['monolog.handler.buffered'] ?? $container->getMonolog_Handler_BufferedService()));

        return $container->privates['console.error_listener'] = new \Symfony\Component\Console\EventListener\ErrorListener($a);
    }
}
