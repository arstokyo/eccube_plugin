<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Abstract class for PersonLevel3 Group 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PersonLevel3G1Abstract extends PersonLevel2G1Abstract implements PersonLevel3G1Interface
{
    /** @var ?string $area 地域コード */
    protected ?string $area = null;

    /** @var ?string $cbar カスタマーコード */
    protected ?string $cbar = null;

    /**
     * {@inheritDoc}
     * 
     */
    public function getArea(): ?string
    {
        return $this->area;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setArea(?string $area): self
    {
        $this->area = $area;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getCbar(): ?string
    {
        return $this->cbar;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setCbar(?string $cbar): self
    {
        $this->cbar = $cbar;
        return $this;
    }
}