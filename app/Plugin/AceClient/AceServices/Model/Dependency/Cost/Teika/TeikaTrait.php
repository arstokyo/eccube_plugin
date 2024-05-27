<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Teika;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 定価
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TeikaTrait 
{

    /** @var ?float $teika 定価 */
    protected ?float $teika = null;

    /**
    * {@inheritDoc}
    */
    public function getTeika(): ?float
    {
        return $this->teika;
    }

    /**
    * {@inheritDoc}
    */
    public function setTeika(?string $teika): static
    {
        $this->teika = NumberConverter::stringWithCommaToFloat($teika);
        return $this;
    }

}