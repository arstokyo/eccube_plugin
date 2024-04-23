<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Utils\Mapper\ConfigNodeRootNameMapper;
use Plugin\AceClient\Config\Model\AceMethod\AceMethodModel;

trait AceMethodConfigLoaderTrait
{
    use BaseConfigLoaderTrait;

    /**
     * Returns The Configuration Node Name.
     * 
     * @return string
     */
    protected function getConfigRootNodeName(): string
    {
        return ConfigNodeRootNameMapper::ACE_METHOD;
    }

    /**
     * Returns The Configuration Model Class.
     * 
     * @return string
     */
    protected function getConfigModelClassName(): string
    {
        return AceMethodModel::class;
    }

} 