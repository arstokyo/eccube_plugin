<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Souko;

/**
 * Trait for 倉庫コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait SoukoTrait
{
        
    /** @var string $souko 倉庫コード */
    protected ?string $souko = null;

    /**
    * {@inheritDoc}
    */
    public function getSouko(): ?string
    {
        return $this->souko;
    }

    /**
    * {@inheritDoc}
    */
    public function setSouko(?string $souko): static
    {
        $this->souko = $souko;
        return $this;
    }

}