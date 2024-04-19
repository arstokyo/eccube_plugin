<?php

namespace Plugin\AceClient\Utils\DependecyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class SoapSerializerConfiguration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('soap_serializer');
        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('XMLNS')->defaultValue('http://www.example.com')->end()
            ->arrayNode('DEFAULT_SERIALIZE_OPTIONS')
                ->addDefaultsIfNotSet()
                ->children()
                    ->arrayNode('options')
                        ->scalarPrototype()->end()
                        ->defaultValue(['option1' => 'value1', 'option2' => 'value2'])
                    ->end()
                ->end()
            ->end();
        // Define your configuration options here

        return $treeBuilder;
    }
}