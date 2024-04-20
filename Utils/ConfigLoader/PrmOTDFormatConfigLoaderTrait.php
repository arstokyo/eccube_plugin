<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Utils\Mapper\ConfigNodeRootNameMapper;
use Plugin\AceClient\COnfig\Model\PrmOTDFormatModel;

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