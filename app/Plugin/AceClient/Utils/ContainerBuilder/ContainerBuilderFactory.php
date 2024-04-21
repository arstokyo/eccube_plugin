<?php

namespace Plugin\AceClient\Utils\ContainerBuilder;

use Plugin\AceClient\DependecyInjection\AceClientExtension;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Factory for Container Builder.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class ContainerBuilderFactory
{
    public static function makeAceExtensionContainer(): ContainerInterface
    {
        $extension = new AceClientExtension();
        $container = new ContainerBuilder();
        $container->registerExtension($extension);

        // Load the configuration
        $extension->load([], $container);
        return $container;
    }
}