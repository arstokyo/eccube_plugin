<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\ConfigWriter;

use Plugin\AceClient43\Entity\Config;
use Plugin\AceClient43\Util\Logger\LoggerFactory;
use Plugin\AceClient43\Util\Mapper\ConfigNodeRootNameMapper;
use Plugin\AceClient43\Util\Mapper\FilePathMapper;
use Symfony\Component\Yaml\Yaml;

class ConfigWriter
{
    /**
     * Update Ace Client Config file
     *
     * @param Config $config
     *
     * @return bool
     *
     * @author Ars-Charan, Ars-Thong
     */
    public static function updateAceClientConfig(Config $config): bool
    {
        $filePath = FilePathMapper::ROOT_CONFIG_PATH.\DIRECTORY_SEPARATOR.FilePathMapper::ACE_CLIENT_FILE_NAME;

        $srcConfig = Yaml::parseFile($filePath);
        $srcConfig['parameters'][ConfigNodeRootNameMapper::ACE_METHOD]['default']['http_client']['base_uri'] = $config->getBaseUri();
        $srcConfig['parameters'][ConfigNodeRootNameMapper::ACE_METHOD]['default']['logger']['class_name'] = $config->getIsLogOn() ? LoggerFactory::DEFAUT_LOGGER_CLASS : LoggerFactory::NULL_LOGGER_CLASS;

        $newYaml = Yaml::dump($srcConfig, 10, 4);

        return false !== file_put_contents($filePath, $newYaml);
    }
}
