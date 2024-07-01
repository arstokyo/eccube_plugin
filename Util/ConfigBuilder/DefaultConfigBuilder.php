<?php

namespace Plugin\AceClient\Util\ConfigBuilder;

use Symfony\Component\Yaml\Yaml;
use Plugin\AceClient\Util\Mapper\FilePathMapper;

/**
 * Class for Default Config Builder.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class DefaultConfigBuilder implements ConfigBuilderInterface
{
    /**
     * {@inheritDoc}
     */
    public static function build($options = null): array
    {
        $filePath = FilePathMapper::ROOT_CONFIG_PATH .\DIRECTORY_SEPARATOR. FilePathMapper::ACE_CLIENT_FILE_NAME;

        return Yaml::parseFile($filePath);
    }
}