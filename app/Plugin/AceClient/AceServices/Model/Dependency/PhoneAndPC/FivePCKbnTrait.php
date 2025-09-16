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

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Trait for 5つPC区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait FivePCKbnTrait
{
    /** @var ?int PC区分1 */
    protected ?int $pckbn1 = null;

    /** @var ?int PC区分2 */
    protected ?int $pckbn2 = null;

    /** @var ?int PC区分3 */
    protected ?int $pckbn3 = null;

    /** @var ?int PC区分4 */
    protected ?int $pckbn4 = null;

    /** @var ?int PC区分5 */
    protected ?int $pckbn5 = null;

    /**
     * {@inheritDoc}
     */
    public function getPckbn1(): ?int
    {
        return $this->pckbn1;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn1(?int $pckbn1)
    {
        $this->pckbn1 = $pckbn1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn2(): ?int
    {
        return $this->pckbn2;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn2(?int $pckbn2)
    {
        $this->pckbn2 = $pckbn2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn3(): ?int
    {
        return $this->pckbn3;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn3(?int $pckbn3)
    {
        $this->pckbn3 = $pckbn3;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn4(): ?int
    {
        return $this->pckbn4;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn4(?int $pckbn4)
    {
        $this->pckbn4 = $pckbn4;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPckbn5(): ?int
    {
        return $this->pckbn5;
    }

    /**
     * {@inheritDoc}
     */
    public function setPckbn5(?int $pckbn5)
    {
        $this->pckbn5 = $pckbn5;

        return $this;
    }
}
