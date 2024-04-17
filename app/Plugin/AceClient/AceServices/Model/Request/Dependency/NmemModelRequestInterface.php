<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\AceServices\Model\Dependency\NmemModelInterface;

interface NmemModelRequestInterface extends NmemModelInterface
{
     /**
     * Set 納品先枝番号
     * 
     * @param int
     * @return NmemModelRequestInterface
     */
    public function setNouEda(int $eda): self;
}