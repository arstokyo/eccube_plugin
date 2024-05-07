<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemGroup1;

/**
 * Nmem Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemModel extends NmemGroup1 implements NmemModelInterface
{
    /** @var ?int $betu 住所区分 */
    private ?int $betu = null;

    /**
     * {@inheritDoc}
     */
    public function getBetu(): ?int
    {
        return $this->betu;
    }

    /**
     * {@inheritDoc}
     */
    public function setBetu(int|null $betu): self
    {
        $this->betu = $betu;
        return $this;
    }
    
}