<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost;

/**
 * Trait for 定価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TeikaTrait 
{

    /** @var ?int $teika 定価 */
    protected ?int $teika = null;

    /**
    * {@inheritDoc}
    */
    public function getTeika(): ?int
    {
        return $this->teika;
    }

    /**
    * {@inheritDoc}
    */
    public function setTeika(?int $teika): static
    {
        $this->teika = $teika;
        return $this;
    }

}