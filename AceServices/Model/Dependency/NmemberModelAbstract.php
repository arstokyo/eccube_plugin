<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

use Plugin\AceClient\AceServices\Model;

class NmemberModelAbstract implements NmemModelInterface
{
    /** @var int 納品先枝番号 */
    protected int $eda;

    /**
     * Get 納品先枝番号
     * 
     * @return int
     */
    public function getEda(): int
    {
        return $this->eda;
    }


    /**
     * Set 納品先枝番号
     * 
     * @param string $eda
     * @return Model\Dependency\NmemberModelAbstract
     */
    public function setEda(int $eda): self
    {  
        $this->eda = $eda;
        return $this;
    }
}