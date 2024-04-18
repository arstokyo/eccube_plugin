<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Plugin\AceClient\AceServices\Model;

interface NmemModelInterface 
{
    /**
     * Get 納品先枝番号
     * 
     * @return int
     */
    public function getEda(): int;

    /**
     * Set 納品先枝番号
     * 
     * @param string $eda
     * @return Model\Dependency\NmemModelInterface
     */
    public function setEda(int $eda): self;
}
