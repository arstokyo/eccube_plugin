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

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Card Model Level 1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait CardModelLevel1Trait
{
    use CnameTrait;

    /** @var ?string カード会社コード */
    protected ?string $ccode = null;

    /** @var ?string カード番号 */
    protected ?string $cno = null;

    /** @var ?AceDateTime\AceDateTimeInterface カード有効期限 */
    protected ?AceDateTime\AceDateTimeInterface $ckigen = null;

    /** @var ?int カード支払方法 */
    protected ?int $cpay = null;

    /** @var ?int カード支払回数 */
    protected ?int $kaisuu = null;

    /** @var ?string カード承認番号 */
    protected ?string $syounin = null;

    /**
     * {@inheritDoc}
     */
    public function getCcode(): ?string
    {
        return $this->ccode;
    }

    /**
     * {@inheritDoc}
     */
    public function setCcode(?string $ccode)
    {
        $this->ccode = $ccode;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCno(): ?string
    {
        return $this->cno;
    }

    /**
     * {@inheritDoc}
     */
    public function setCno(?string $cno)
    {
        $this->cno = $cno;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCkigen()
    {
        return $this->ckigen;
    }

    /**
     * {@inheritDoc}
     */
    public function setCkigen($ckigen)
    {
        $this->ckigen = AceDateTime\AceDateTimeFactory::makeAceDateTime($ckigen, 'Ym');

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCpay(): ?int
    {
        return $this->cpay;
    }

    /**
     * {@inheritDoc}
     */
    public function setCpay(?int $cpay)
    {
        $this->cpay = $cpay;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKaisuu(): ?int
    {
        return $this->kaisuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setKaisuu(?int $kaisuu)
    {
        $this->kaisuu = $kaisuu;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSyounin(): ?string
    {
        return $this->syounin;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyounin(?string $syounin)
    {
        $this->syounin = $syounin;

        return $this;
    }
}
