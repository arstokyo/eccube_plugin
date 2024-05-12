<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Trait for PersonLevel3
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel3Trait
{
    
    /** @var ?string $area 地域コード */
    protected ?string $area = null;

    /** @var ?string $cbar カスタマーコード */
    protected ?string $cbar = null;

    /**
     * {@inheritDoc}
     */
    public function getArea(): ?string
    {
        return $this->area;
    }

    /**
     * {@inheritDoc}
     */
    public function setArea(?string $area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCbar(): ?string
    {
        return $this->cbar;
    }

    /**
     * {@inheritDoc}
     */
    public function setCbar(?string $cbar)
    {
        $this->cbar = $cbar;
        return $this;
    }
}