<?php

namespace ContainerVTFAYMC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getComposerInstallCommandService extends Eccube_KernelInstallContainer
{
    /*
     * Gets the private 'Eccube\Command\ComposerInstallCommand' shared autowired service.
     *
     * @return \Eccube\Command\ComposerInstallCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/src/Eccube/Command/ComposerInstallCommand.php';

        $container->privates['Eccube\\Command\\ComposerInstallCommand'] = $instance = new \Eccube\Command\ComposerInstallCommand(($container->services['Eccube\\Service\\Composer\\ComposerApiService'] ?? $container->load('getComposerApiServiceService')));

        $instance->setName('eccube:composer:install');

        return $instance;
    }
}
