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
 * Trait for Has Two 分割
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TwoBunKatuTrait
{
    /** @var ?int 分割初回金額 */
    protected ?int $bun1 = null;

    /** @var ?int 分割初回以外金額 */
    protected ?int $bun2 = null;

    /**
     * {@inheritDoc}
     */
    public function getBun1(): ?int
    {
        return $this->bun1;
    }

    /**
     * {@inheritDoc}
     */
    public function setBun1(?int $bun1)
    {
        $this->bun1 = $bun1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBun2(): ?int
    {
        return $this->bun2;
    }

    /**
     * {@inheritDoc}
     */
    public function setBun2(?int $bun2)
    {
        $this->bun2 = $bun2;

        return $this;
    }
}
