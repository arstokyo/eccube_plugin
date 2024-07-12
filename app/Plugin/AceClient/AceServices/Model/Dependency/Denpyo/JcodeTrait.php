<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 受注方法コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JcodeTrait 
{
        
    /** @var ?int $jcode 受注方法コード */
    protected ?int $jcode = null;

    /**
    * {@inheritDoc}
    */
    public function getJcode(): ?int
    {
        return $this->jcode;
    }

    /**
    * {@inheritDoc}
    */
    public function setJcode(?int $jcode)
    {
        $this->jcode = $jcode;
        return $this;
    }

}