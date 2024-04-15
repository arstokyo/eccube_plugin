<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\NmemberModelAbstract;

class NmemModelRequestAbstract extends NmemberModelAbstract implements PersonModelRequestInterface
{

    /**
     * Get 納品先枝番号
     * 
     * @return int
     */
    public function getNouEda() : int
    {
        return $this->eda;
    }
    
}