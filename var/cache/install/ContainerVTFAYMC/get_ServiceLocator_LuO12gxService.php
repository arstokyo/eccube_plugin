<?php

namespace ContainerVTFAYMC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_LuO12gxService extends Eccube_KernelInstallContainer
{
    /*
     * Gets the private '.service_locator.LuO12gx' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.LuO12gx'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'Block' => ['privates', '.errored..service_locator.LuO12gx.Eccube\\Entity\\Block', NULL, 'Cannot autowire service ".service_locator.LuO12gx": it references class "Eccube\\Entity\\Block" but no such service exists.'],
            'cacheUtil' => ['privates', 'Eccube\\Util\\CacheUtil', 'getCacheUtilService', true],
            'fs' => ['services', '.container.private.filesystem', 'get_Container_Private_FilesystemService', true],
        ], [
            'Block' => 'Eccube\\Entity\\Block',
            'cacheUtil' => 'Eccube\\Util\\CacheUtil',
            'fs' => '?',
        ]);
    }
}
