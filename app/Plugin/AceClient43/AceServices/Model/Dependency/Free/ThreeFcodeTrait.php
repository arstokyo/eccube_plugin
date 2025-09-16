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
 * Trait for 3つフリーコード
 *
 * @author: Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFcodeTrait
{
    /** @var string|null フリーコード1 */
    protected ?string $fcode1 = null;

    /** @var ?string フリーコード2 */
    protected ?string $fcode2 = null;

    /** @var ?string フリーコード3 */
    protected ?string $fcode3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFcode1(): ?string
    {
        return $this->fcode1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcode1(?string $fcode1)
    {
        $this->fcode1 = $fcode1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcode2(): ?string
    {
        return $this->fcode2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcode2(?string $fcode2)
    {
        $this->fcode2 = $fcode2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFcode3(): ?string
    {
        return $this->fcode3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFcode3(?string $fcode3)
    {
        $this->fcode3 = $fcode3;

        return $this;
    }
}
