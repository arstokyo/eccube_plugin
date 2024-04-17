<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\NmemModelRequestAbstract;

class NmemModelAbstract extends NmemModelRequestAbstract implements NmemModelInterface
{
    
    /**
     * Set 納品先枝番号
     * 
     * @param int $eda
     * @return Jyuden\Dependency\NmemModelAbstract
     */
    public function setNouEda(int $eda): self
    {
        $this->eda = $eda;
        return $this;
    }

}