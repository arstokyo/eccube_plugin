<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Dependency\NmemberModelAbstract;

abstract  class NmemModelRequestAbstract extends NmemberModelAbstract implements NmemModelRequestInterface
{

    /**
     * Set 納品先枝番号
     * 
     * @param int $eda
     * @return Request\Dependency\NmemModelRequestAbstract
     */
    public function setNouEda(int $eda): self
    {
        $this->eda = $eda;
        return $this;
    }
    
}