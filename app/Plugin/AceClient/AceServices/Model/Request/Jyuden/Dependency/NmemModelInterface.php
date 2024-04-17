<?php

namespace Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency;

use Plugin\AceClient\AceServices\Model\Request\Jyuden;
use Plugin\AceClient\AceServices\Model\Request\Dependency\NmemModelRequestInterface;

interface NmemModelInterface extends NmemModelRequestInterface
{

     /**
     * Set 納品先枝番号
     * 
     * @param int
     * @return Jyuden\Dependency\NmemModelInterface
     */
    public function setNouEda(int $eda): self;

}