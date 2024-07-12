<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient43\AceServices\Model\Dependency\Message\HasMessageModelTrait;

/**
 * Class for Member Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MemberModel implements MemberModelInterface
{
    use HasMessageModelTrait;

    /** @var NmemModel|null $nmember Nmem */
    private ?NmemModel $nmember = null;

    /**
     * {@inheritDoc}
     */
    public function getNmember(): ?NmemModel
    {
        return $this->nmember;
    }

    /**
     * {@inheritDoc}
     */
    public function setNmember(?NmemModel $nmember): self
    {
        $this->nmember = $nmember;
        return $this;
    }
    
}