<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;

/**
 * Trait for 納品先顧客コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NcodeTrait 
{

    /** @var ?string $ncode 納品先顧客コード */
    protected ?string $ncode = null;

    /**
    * {@inheritDoc}
    */
    public function getNcode(): ?string
    {
        return $this->ncode;
    }

    /**
    * {@inheritDoc}
    */
    public function setNcode(?string $ncode)
    {
        $this->ncode = $ncode;
        return $this;
    }   

}