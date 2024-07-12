<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Teika;

use Plugin\AceClient43\Util\Converter\NumberConverter;

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
    public function setTeika(?string $teika)
    {
        $this->teika = NumberConverter::stringWithCommaToFloat($teika);
        return $this;
    }

}