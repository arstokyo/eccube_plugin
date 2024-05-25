<?php

namespace Plugin\AceClient\Utils\ConfigWriter;

use Symfony\Component\Yaml\Yaml;
use Plugin\AceClient\Utils\Mapper\FilePathMapper;
use Plugin\AceClient\Utils\Mapper\ConfigNodeRootNameMapper;
use Plugin\AceClient\Entity\Config;
use Plugin\AceClient\Utils\Log\LoggerFactory;

class ConfigWriter
{

    /**
     * Update AceClientConfig.yaml
     *
     * @param Config $config
     * @return bool
     * @author Ars-Charan, Ars-Thong
     */
    public static function updateAceClientConfig(Config $config): bool
    {
        $filePath = FilePathMapper::ROOT_CONFIG_PATH .\DIRECTORY_SEPARATOR. FilePathMapper::ACE_CLIENT_FILE_NAME;

        $srcConfig = Yaml::parseFile($filePath);
        $srcConfig['parameters'][ConfigNodeRootNameMapper::ACE_METHOD]['default']['http_client']['base_uri'] = $config->getBaseUri();
        $srcConfig['parameters'][ConfigNodeRootNameMapper::ACE_METHOD]['default']['logger']['class_name'] = $config->getIsLogOn() ? LoggerFactory::DEFAUT_LOGGER_CLASS : LoggerFactory::NULL_LOGGER_CLASS;

        $newYaml = Yaml::dump($srcConfig, 10, 4);
        return false !== file_put_contents($filePath, $newYaml);
    }

}