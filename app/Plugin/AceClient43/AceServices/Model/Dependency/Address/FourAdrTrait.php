<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\Address;

/**
 * Trait for 4つ住所
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FourAdrTrait
{
    /** @var ?string 住所1 */
    protected ?string $adr1 = null;

    /** @var ?string 住所2 */
    protected ?string $adr2 = null;

    /** @var ?string 住所3 */
    protected ?string $adr3 = null;

    /** @var ?string 住所4 */
    protected ?string $adr4 = null;

    /**
     * {@inheritDoc}
     */
    public function getAdr1(): ?string
    {
        return $this->adr1;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr1(?string $adr1)
    {
        $this->adr1 = $adr1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdr2(): ?string
    {
        return $this->adr2;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr2(?string $adr2)
    {
        $this->adr2 = $adr2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdr3(): ?string
    {
        return $this->adr3;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr3(?string $adr3)
    {
        $this->adr3 = $adr3;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdr4(): ?string
    {
        return $this->adr4;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr4(?string $adr4)
    {
        $this->adr4 = $adr4;

        return $this;
    }
}
