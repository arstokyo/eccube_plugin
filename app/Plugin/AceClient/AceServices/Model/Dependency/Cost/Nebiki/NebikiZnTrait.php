<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Cost\Nebiki;

use Plugin\AceClient\Util\Converter\NumberConverter;

/**
 * Trait for 値引合計
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait NebikiZnTrait 
{
    /** @var ?float $nebikizn 値引合計 */
    protected ?float $nebikizn = null;

    /**
     * {@inheritDoc}
     */
    public function getNebikizn(): ?float
    {
        return $this->nebikizn;
    }

    /**
     * {@inheritDoc}
     */
    public function setNebikizn(?string $nebikizn): static
    {
        $this->nebikizn = NumberConverter::stringWithCommaToFloat($nebikizn);
        return $this;
    }
}