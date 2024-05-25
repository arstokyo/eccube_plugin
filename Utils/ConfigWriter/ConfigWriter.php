<?php

namespace Plugin\AceClient\Utils\ConfigWriter;

use Symfony\Component\Yaml\Yaml;
use Plugin\AceClient\Utils\Mapper\FilePathMapper;
use Plugin\AceClient\Utils\Mapper\ConfigNodeRootNameMapper;

class ConfigWriter
{

    /**
     * Update base_uri in AceClientConfig.yaml
     *
     * @param string $newUri
     * @return void
     * @author Ars-Charan, Ars-Thong
     */
    public static function updateBaseUri(string $newUri): void
    {
        $filePath = FilePathMapper::ROOT_CONFIG_PATH .\DIRECTORY_SEPARATOR. FilePathMapper::ACE_CLIENT_FILE_NAME;

        $srcConfig = Yaml::parseFile($filePath);
        $srcConfig['parameters'][ConfigNodeRootNameMapper::ACE_METHOD]['default']['http_client']['base_uri'] = $newUri;

        $newYaml = Yaml::dump($srcConfig, 10, 4);
        file_put_contents($filePath, $newYaml);
    }

}