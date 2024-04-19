<?php

namespace Plugin\AceClient\DependecyInjection;

use Plugin\AceClient\Utils\Mapper\ConfigFileMapper;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class SoapSerializerExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new SoapSerializerConfiguration();

        $processedConfig = $this->processConfiguration($configuration, $configs);

        $loader = new YamlFileLoader($container, new FileLocator(ConfigFileMapper::ROOT_CONFIG_PATH));
        $loader->load(ConfigFileMapper::SOAP_SERIALIZER_FILE_NAME);
        
        $soapSerializerDefinition = $container->getDefinition('ace_client.soap_serializer');
        // Your code here
    }
}