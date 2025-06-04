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

use Plugin\AceClient43\Util\Mapper\FilePathMapper;
use Symfony\Component\Yaml\Yaml;

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
        $filePath = FilePathMapper::ROOT_CONFIG_PATH.\DIRECTORY_SEPARATOR.FilePathMapper::ACE_CLIENT_FILE_NAME;

        return Yaml::parseFile($filePath);
    }
}
