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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

use Plugin\AceClient43\AceServices\Model\Dependency\Card\GMO\GMOModelGroup1Trait;

/**
 * Model for Card Level 2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CardModelLevel2Trait
{
    use CardModelLevel1Trait;
    use GMOModelGroup1Trait;

    /** @var ?string SPS会員ID */
    protected ?string $spscustomerid = null;

    /** @var ?string SPSトランザクションID */
    protected ?string $spstid = null;

    /** @var ?string VeriTransステータス */
    protected ?string $veristatus = null;

    /** @var ?string VeriTrans取引ID */
    protected ?string $veriorderid = null;

    /**
     * {@inheritDoc}
     */
    public function getSpscustomerid(): ?string
    {
        return $this->spscustomerid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpscustomerid(?string $spscustomerid)
    {
        $this->spscustomerid = $spscustomerid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSpstid(): ?string
    {
        return $this->spstid;
    }

    /**
     * {@inheritDoc}
     */
    public function setSpstid(?string $spstid)
    {
        $this->spstid = $spstid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getVeristatus(): ?string
    {
        return $this->veristatus;
    }

    /**
     * {@inheritDoc}
     */
    public function setVeristatus(?string $veristatus)
    {
        $this->veristatus = $veristatus;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getVeriorderid(): ?string
    {
        return $this->veriorderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setVeriorderid(?string $veriorderid)
    {
        $this->veriorderid = $veriorderid;

        return $this;
    }
}
