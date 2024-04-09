<?php

namespace ContainerJeLjmue;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getEccube_LoggerService extends Eccube_KernelProdContainer
{
    /*
     * Gets the public 'eccube.logger' shared autowired service.
     *
     * @return \Eccube\Log\Logger
     */
    public static function do($container, $lazyLoad = true)
    {
        if ($lazyLoad) {
            return $container->services['eccube.logger'] = $container->createProxy('Logger_fadf7f2', function () use ($container) {
                return \Logger_fadf7f2::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = self::do($container, false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        include_once \dirname(__DIR__, 4).'/vendor/psr/log/Psr/Log/AbstractLogger.php';
        include_once \dirname(__DIR__, 4).'/src/Eccube/Log/Logger.php';

        return new \Eccube\Log\Logger(($container->privates['Eccube\\Request\\Context'] ?? $container->getContextService()), ($container->privates['monolog.logger'] ?? $container->getMonolog_LoggerService()), ($container->services['monolog.logger.front'] ?? $container->load('getMonolog_Logger_FrontService')), ($container->services['monolog.logger.admin'] ?? $container->load('getMonolog_Logger_AdminService')));
    }
}
