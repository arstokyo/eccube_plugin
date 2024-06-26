<?php

namespace Plugin\AceClient\Util\ConfigLoader;

use Plugin\AceClient\Util\Mapper\ConfigNodeRootNameMapper;
use Plugin\AceClient\AceConfig\Model\PrmFormat\PrmOTDFormatModel;

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