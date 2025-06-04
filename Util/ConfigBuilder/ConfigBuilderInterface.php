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

/**
 * Interface for Config Builder.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface ConfigBuilderInterface
{
    /**
     * Builds the configuration.
     *
     * @param mixed|null $options
     *
     * @return array
     */
    public static function build($options = null): array;
}
