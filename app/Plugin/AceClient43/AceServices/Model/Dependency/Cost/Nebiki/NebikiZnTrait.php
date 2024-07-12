<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Nebiki;

use Plugin\AceClient43\Util\Converter\NumberConverter;

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
    public function setNebikizn(?string $nebikizn)
    {
        $this->nebikizn = NumberConverter::stringWithCommaToFloat($nebikizn);
        return $this;
    }
}