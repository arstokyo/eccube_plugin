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
 * Trait For 3つ代表者電話番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FiveFdenwaBangoTrait
{
    /** @var ?string 代表者電話番号1 */
    protected ?string $freedenwabango1 = null;

    /** @var ?string 代表者電話番号2 */
    protected ?string $freedenwabango2 = null;

    /** @var ?string 代表者電話番号3 */
    protected ?string $freedenwabango3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFreeDenwaBango1(): ?string
    {
        return $this->freedenwabango1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenwaBango1(?string $freedenwabango1)
    {
        $this->freedenwabango1 = $freedenwabango1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenwaBango2(): ?string
    {
        return $this->freedenwabango2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenwaBango2(?string $freedenwabango2)
    {
        $this->freedenwabango2 = $freedenwabango2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeDenwaBango3(): ?string
    {
        return $this->freedenwabango3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeDenwaBango3(?string $freedenwabango3)
    {
        $this->freedenwabango3 = $freedenwabango3;

        return $this;
    }
}
