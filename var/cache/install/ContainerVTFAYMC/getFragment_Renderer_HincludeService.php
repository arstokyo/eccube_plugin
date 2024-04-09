<?php

namespace ContainerVTFAYMC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFragment_Renderer_HincludeService extends Eccube_KernelInstallContainer
{
    /*
     * Gets the private 'fragment.renderer.hinclude' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Fragment/FragmentRendererInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Fragment/RoutableFragmentRenderer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/http-kernel/Fragment/HIncludeFragmentRenderer.php';

        $a = ($container->services['.container.private.twig'] ?? $container->get_Container_Private_TwigService());

        if (isset($container->privates['fragment.renderer.hinclude'])) {
            return $container->privates['fragment.renderer.hinclude'];
        }

        $container->privates['fragment.renderer.hinclude'] = $instance = new \Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer($a, ($container->privates['uri_signer'] ?? ($container->privates['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner($container->getEnv('ECCUBE_AUTH_MAGIC')))), NULL);

        $instance->setFragmentPath('/_fragment');

        return $instance;
    }
}
