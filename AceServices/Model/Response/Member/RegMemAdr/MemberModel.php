<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\RegMemAdr;

use Plugin\AceClient\AceServices\Model\Response\Depedency\MemberModelResponseAbstract;

/**
 * Class for Member Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class MemberModel extends MemberModelResponseAbstract implements MemberModelInterface
{

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