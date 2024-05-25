<?php

namespace Plugin\AceClient\DependecyInjection;

use Plugin\AceClient\Utils\Mapper\FilePathMapper;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Plugin\AceClient\Utils\Helper\ServiceRetrieveHelper;
use Plugin\AceClient\Repository\ConfigRepository;

/**
 * Extension for AceClient.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class AceClientExtension extends Extension
{

    /**
     * Load the configuration.
     * 
     * @param array $configs
     * @param ContainerBuilder $container
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(FilePathMapper::ROOT_CONFIG_PATH));
        if (isset($kernel)) {
            /** @var ServiceRetrieveHelper $aceClientHelper */
            $aceClientHelper = $kernel->getContainer()->get('service.retrieve.helper');
            $loader->load(FilePathMapper::ACE_CLIENT_FILE_NAME);
        }

        $loader->load(FilePathMapper::ACE_CLIENT_FILE_NAME);
        unset($loader);
    }
}