<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\NmemberModelAbstract;

class NmemModelRequestAbstract extends NmemberModelAbstract implements NmemModelRequestInterface
{

    /**
     * Set 納品先枝番号
     * 
     * @param int $eda
     * @return NmemModelRequestAbstract
     */
    public function setNouEda(int $eda): self
    {
        $this->eda = $eda;
        return $this;
    }
    
}