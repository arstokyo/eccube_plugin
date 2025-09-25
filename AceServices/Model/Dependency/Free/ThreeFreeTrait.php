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
 * Trait For 3つフリー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFreeTrait
{
    /** @var string|null フリー1 */
    protected ?string $free1 = null;

    /** @var string|null フリー2 */
    protected ?string $free2 = null;

    /** @var string|null フリー3 */
    protected ?string $free3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFree1(): ?string
    {
        return $this->free1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree1(?string $free1)
    {
        $this->free1 = $free1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree2(): ?string
    {
        return $this->free2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree2(?string $free2)
    {
        $this->free2 = $free2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree3(): ?string
    {
        return $this->free3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree3(?string $free3)
    {
        $this->free3 = $free3;

        return $this;
    }
}
