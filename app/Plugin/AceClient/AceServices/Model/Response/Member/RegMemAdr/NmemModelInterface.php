<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemGroup1Interface;

/**
 * Interface for Nmem Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface NmemModelInterface extends NmemGroup1Interface
{
    
    /**
     * Get 住所区分
     * 
     * @return int|null
     */
    public function getBetu(): ?int;

    /**
     * Set 住所区分
     * 
     * @param int|null $betu
     * @return self
     */
    public function setBetu(?int $betu): self;

}