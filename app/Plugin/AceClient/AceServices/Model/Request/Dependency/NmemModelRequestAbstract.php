<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\NmemberModelAbstract;

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