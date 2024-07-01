<?php

namespace Plugin\AceClient\Util\ConfigBuilder;

use Plugin\AceClient\Repository\ConfigRepository;
use Plugin\AceClient\Util\Mapper\ConfigNodeRootNameMapper;
use Plugin\AceClient\Util\Logger\LoggerFactory;

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