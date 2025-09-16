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
 * Trait For FreeGroup3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait FreeGroup3Trait
{
    /** @var ?int ファイル区分 */
    protected ?int $frkbn = null;

    /** @var ?string キー情報 */
    protected ?string $frkey = null;

    /** @var ?int フリー項目区分 */
    protected ?int $fmkbn = null;

    /** @var ?string フリー内容 */
    protected ?string $free = null;

    /**
     * {@inheritDoc}
     */
    public function getFrkbn(): ?int
    {
        return $this->frkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFrkbn(?int $frkbn)
    {
        $this->frkbn = $frkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFrkey(): ?string
    {
        return $this->frkey;
    }

    /**
     * {@inheritDoc}
     */
    public function setFrkey(?string $frkey)
    {
        $this->frkey = $frkey;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFmkbn(): ?int
    {
        return $this->fmkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setFmkbn(?int $fmkbn)
    {
        $this->fmkbn = $fmkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getFree(): ?string
    {
        return $this->free;
    }

    /**
     * {@inheritDoc}
     */
    public function setFree(?string $free)
    {
        $this->free = $free;

        return $this;
    }
}
