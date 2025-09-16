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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

/**
 * Trait For FreeGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class FreeGroup2Trait implements HasFreeGroup2Interface
{
    use FreeGroup1Trait;
    /** @var ?int 決済種別種類 */
    protected ?int $kessaishubetsu = null;
    /** @var ?int 送料区分 */
    protected ?int $freesouryoukubun = null;
    /** @var ?string 表示区分ID */
    protected ?string $freedispkbnid = null;
    /** @var ?string 表示区分名 */
    protected ?string $freedispkbnname = null;

    public function getKessaishubetsu(): ?int
    {
        return $this->kessaishubetsu;
    }

    /**
     * {@inheritDoc}
     */
    public function setKessaishubetsu(?int $kessaishubetsu)
    {
        $this->kessaishubetsu = $kessaishubetsu;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreesouryoukubun(): ?int
    {
        return $this->freesouryoukubun;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreesouryoukubun(?int $freesouryoukubun)
    {
        $this->freesouryoukubun = $freesouryoukubun;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedispkbnid(): ?string
    {
        return $this->freedispkbnid;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedispkbnid(?string $freedispkbnid)
    {
        $this->freedispkbnid = $freedispkbnid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreedispkbnname(): ?string
    {
        return $this->freedispkbnname;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreedispkbnname(?string $freedispkbnname)
    {
        $this->freedispkbnname = $freedispkbnname;

        return $this;
    }
}
