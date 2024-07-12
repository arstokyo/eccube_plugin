<?php

namespace Plugin\AceClient43\Util\ConfigLoader;

use Plugin\AceClient43\Util\Mapper\ConfigNodeRootNameMapper;
use Plugin\AceClient43\AceConfig\Model\AceMethod\AceMethodModel;

/**
 * Trait for AceMethod Config Loader.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
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