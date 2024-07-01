<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送会社名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HnameTrait
{
    /** @var ?string $hname 配送会社名称 */
    protected ?string $hname = null;

    /**
     * {@inheritDoc}
     */
    public function getHname(): ?string
    {
        return $this->hname;
    }

    /**
     * {@inheritDoc}
     */
    public function setHname(?string $hname)
    {
        $this->hname = $hname;
        return $this;
    }
}