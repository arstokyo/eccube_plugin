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
 * Trait for 3つフリー
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ThreeFmemoTrait
{
    /** @var ?string フリーメモ1 */
    protected ?string $fmemo1 = null;

    /** @var ?string フリーメモ2 */
    protected ?string $fmemo2 = null;

    /** @var ?string フリーメモ3 */
    protected ?string $fmemo3 = null;

    /**
     * {@inheritDoc}
     */
    public function getFmemo1(): ?string
    {
        return $this->fmemo1;
    }

    /**
     * {@inheritDoc}
     */
    public function setFmemo1(?string $fmemo1)
    {
        $this->fmemo1 = $fmemo1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFmemo2(): ?string
    {
        return $this->fmemo2;
    }

    /**
     * {@inheritDoc}
     */
    public function setFmemo2(?string $fmemo2)
    {
        $this->fmemo2 = $fmemo2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFmemo3(): ?string
    {
        return $this->fmemo3;
    }

    /**
     * {@inheritDoc}
     */
    public function setFmemo3(?string $fmemo3)
    {
        $this->fmemo3 = $fmemo3;

        return $this;
    }
}
