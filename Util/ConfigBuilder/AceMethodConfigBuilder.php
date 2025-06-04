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

namespace Plugin\AceClient43\Util\ConfigBuilder;

use Plugin\AceClient43\Repository\ConfigRepository;
use Plugin\AceClient43\Util\Logger\LoggerFactory;
use Plugin\AceClient43\Util\Mapper\ConfigNodeRootNameMapper;

/**
 * Class for Ace Method Config Builder.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceMethodConfigBuilder implements ConfigBuilderInterface
{
    /**
     * @param ConfigRepository|null $options
     *
     * @throws \RuntimeException
     */
    public static function build($options = null): array
    {
        $srcConfig = DefaultConfigBuilder::build();
        $optionConfig = $options->get();

        if (is_null($optionConfig)) {
            throw new \RuntimeException('AceClientConfig is not found. Ensure the AceClientConfig is inserted.');
        }

        $srcConfig[ConfigNodeRootNameMapper::ACE_METHOD]['default']['http_client']['base_uri'] = $optionConfig->getBaseUri();
        $srcConfig[ConfigNodeRootNameMapper::ACE_METHOD]['default']['logger']['class_name'] = $optionConfig->getIsLogOn() ? LoggerFactory::DEFAUT_LOGGER_CLASS : LoggerFactory::NULL_LOGGER_CLASS;

        return $srcConfig;
    }
}
