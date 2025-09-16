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
 * Trait For 5つ注文確認ﾒｰﾙｱﾄﾞﾚｽ
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FiveForderMailTrait
{
    /** @var ?string 注文確認ﾒｰﾙｱﾄﾞﾚｽ1 */
    protected ?string $freeordermail1 = null;
    /** @var ?string 注文確認ﾒｰﾙｱﾄﾞﾚｽ2 */
    protected ?string $freeordermail2 = null;
    /** @var ?string 注文確認ﾒｰﾙｱﾄﾞﾚｽ3 */
    protected ?string $freeordermail3 = null;
    /** @var ?string 注文確認ﾒｰﾙｱﾄﾞﾚｽ4 */
    protected ?string $freeordermail4 = null;
    /** @var ?string 注文確認ﾒｰﾙｱﾄﾞﾚｽ5 */
    protected ?string $freeordermail5 = null;

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail1(): ?string
    {
        return $this->freeordermail1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail1(?string $freeordermail1)
    {
        $this->freeordermail1 = $freeordermail1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail2(): ?string
    {
        return $this->freeordermail2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail2(?string $freeordermail2)
    {
        $this->freeordermail2 = $freeordermail2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail3(): ?string
    {
        return $this->freeordermail3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail3(?string $freeordermail3)
    {
        $this->freeordermail3 = $freeordermail3;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail4(): ?string
    {
        return $this->freeordermail4;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail4(?string $freeordermail4)
    {
        $this->freeordermail4 = $freeordermail4;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFreeOrderMail5(): ?string
    {
        return $this->freeordermail5;
    }

    /**
     * {@inheritDoc}
     */
    public function setFreeOrderMail5(?string $freeordermail5)
    {
        $this->freeordermail5 = $freeordermail5;

        return $this;
    }
}
