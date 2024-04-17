<?php

namespace Plugin\AceClient\AceService\Model\Request\Dependency;

use Plugin\AceClient\AceService\Model\DependencyModel\NmemberModelAbstract;

class NmemModelRequestAbstract extends NmemberModelAbstract implements PersonModelRequestInterface
{

    /**
     * Set 納品先枝番号
     * 
     * @param int
     */
    public function setNouEda(int $eda)
    {
        $this->eda = $eda;
    }
    
}