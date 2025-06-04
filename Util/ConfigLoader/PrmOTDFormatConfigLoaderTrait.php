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

namespace Plugin\AceClient43\Util\ConfigLoader;

use Plugin\AceClient43\AceConfig\Model\PrmFormat\PrmOTDFormatModel;
use Plugin\AceClient43\Util\Mapper\ConfigNodeRootNameMapper;

/**
 * Trait for PrmOTDFormatConfigLoader.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PrmOTDFormatConfigLoaderTrait
{
    use BaseConfigLoaderTrait;

    /**
     * Returns The Configuration Node Name.
     *
     * @return string
     */
    protected function getConfigRootNodeName(): string
    {
        return ConfigNodeRootNameMapper::PRM_OTD_FORMAT;
    }

    /**
     * Returns The Configuration Model Class.
     *
     * @return string
     */
    protected function getConfigModelClassName(): string
    {
        return PrmOTDFormatModel::class;
    }
}
