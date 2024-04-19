<?php

namespace Plugin\AceClient\DependecyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class SoapHttpClientConfiguration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('SoapHttpClient');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
                ->scalarNode('wsdl')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('options')
                    ->defaultValue([])
                ->end()
            ->end();
        return $treeBuilder;
    }
}