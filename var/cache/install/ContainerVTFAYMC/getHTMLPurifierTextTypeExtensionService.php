<?php

namespace ContainerVTFAYMC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHTMLPurifierTextTypeExtensionService extends Eccube_KernelInstallContainer
{
    /*
     * Gets the private 'Eccube\Form\Extension\HTMLPurifierTextTypeExtension' shared autowired service.
     *
     * @return \Eccube\Form\Extension\HTMLPurifierTextTypeExtension
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/FormTypeExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/form/AbstractTypeExtension.php';
        include_once \dirname(__DIR__, 4).'/src/Eccube/Form/Extension/HTMLPurifierTextTypeExtension.php';

        return $container->privates['Eccube\\Form\\Extension\\HTMLPurifierTextTypeExtension'] = new \Eccube\Form\Extension\HTMLPurifierTextTypeExtension(($container->privates['Eccube\\Request\\Context'] ?? $container->load('getContextService')));
    }
}
