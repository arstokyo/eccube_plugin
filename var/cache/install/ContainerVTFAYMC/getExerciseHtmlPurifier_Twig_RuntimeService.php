<?php

namespace ContainerVTFAYMC;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getExerciseHtmlPurifier_Twig_RuntimeService extends Eccube_KernelInstallContainer
{
    /*
     * Gets the private 'exercise_html_purifier.twig.runtime' shared service.
     *
     * @return \Exercise\HTMLPurifierBundle\Twig\HTMLPurifierRuntime
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/twig/twig/src/Extension/RuntimeExtensionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/exercise/htmlpurifier-bundle/src/Twig/HTMLPurifierRuntime.php';

        return $container->privates['exercise_html_purifier.twig.runtime'] = new \Exercise\HTMLPurifierBundle\Twig\HTMLPurifierRuntime(($container->privates['exercise_html_purifier.purifiers_registry'] ?? $container->load('getExerciseHtmlPurifier_PurifiersRegistryService')));
    }
}
