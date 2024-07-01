<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for 担当者コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TcodeTrait
{

    /** @var ?string $tcode 担当者コード */
    protected ?string $tcode = null;

    /**
     * {@inheritDoc}
     */
    public function getTcode(): ?string
    {
        return $this->tcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setTcode(?string $tcode)
    {
        $this->tcode = $tcode;
        return $this;
    }
    
}
