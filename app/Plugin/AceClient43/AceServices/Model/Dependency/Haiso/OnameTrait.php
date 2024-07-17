<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送会社名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait OnameTrait
{
    /** @var ?string $oname 配送会社名称 */
    protected ?string $oname = null;

    /**
     * {@inheritDoc}
     */
    public function getOname(): ?string
    {
        return $this->oname;
    }

    /**
     * {@inheritDoc}
     */
    public function setOname(?string $oname)
    {
        $this->oname = $oname;
        return $this;
    }
}