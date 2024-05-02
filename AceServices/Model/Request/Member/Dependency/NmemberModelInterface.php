<?php

namespace  Plugin\AceClient\AceServices\Model\Request\Member\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberInterface;

interface NmemberModelInterface extends NmemberInterface
{
    /**
     * Get 納品先枝番号
     * 
     */
    public function getEda(): ?int;

    /**
     * Set 納品先枝番号
     * 
     */
    public function setEda(?int $eda);
    
}