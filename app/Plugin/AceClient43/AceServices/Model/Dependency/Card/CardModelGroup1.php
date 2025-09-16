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

/**
 * Model for カード情報 Group1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class CardModelGroup1 extends CardModelLevel2 implements CardModelGroup1Interface
{
    /** @var ?string PGT顧客ID */
    protected ?string $pgtmemid = null;

    /** @var ?string PGT顧客カードID */
    protected ?string $pgtmemcdid = null;

    /** @var ?string PGT取引ID */
    protected ?string $pgttid = null;

    /** @var ?string PGT決済ID */
    protected ?string $pgtid = null;

    /** @var ?string PGTイシュア区分 */
    protected ?string $pgticls = null;

    /** @var ?string GMOカード有効期限 */
    protected ?string $gmocardeda = null;

    /**
     * {@inheritDoc}
     */
    public function getPgtmemid(): ?string
    {
        return $this->pgtmemid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtmemid(?string $pgtmemid)
    {
        $this->pgtmemid = $pgtmemid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgtmemcdid(): ?string
    {
        return $this->pgtmemcdid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtmemcdid(?string $pgtmemcdid)
    {
        $this->pgtmemcdid = $pgtmemcdid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgttid(): ?string
    {
        return $this->pgttid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgttid(?string $pgttid)
    {
        $this->pgttid = $pgttid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgtid(): ?string
    {
        return $this->pgtid;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgtid(?string $pgtid)
    {
        $this->pgtid = $pgtid;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPgticls(): ?string
    {
        return $this->pgticls;
    }

    /**
     * {@inheritDoc}
     */
    public function setPgticls(?string $pgticls)
    {
        $this->pgticls = $pgticls;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getGmocardeda(): ?string
    {
        return $this->gmocardeda;
    }

    /**
     * {@inheritDoc}
     */
    public function setGmocardeda(?string $gmocardeda)
    {
        $this->gmocardeda = $gmocardeda;

        return $this;
    }
}
