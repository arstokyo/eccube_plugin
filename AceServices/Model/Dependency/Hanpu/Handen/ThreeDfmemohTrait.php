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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

/**
 * Trait ThreeDfmemoh
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ThreeDfmemohTrait
{
    /** @var ?string 伝票フリーメモ1 */
    protected ?string $dfmemoh1 = null;

    /** @var ?string 伝票フリーメモ2 */
    protected ?string $dfmemoh2 = null;

    /** @var ?string 伝票フリーメモ3 */
    protected ?string $dfmemoh3 = null;

    /**
     * {@inheritDoc}
     */
    public function getDfmemoh1(): ?string
    {
        return $this->dfmemoh1;
    }

    /**
     * {@inheritDoc}
     */
    public function setDfmemoh1(?string $dfmemoh1)
    {
        $this->dfmemoh1 = $dfmemoh1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDfmemoh2(): ?string
    {
        return $this->dfmemoh2;
    }

    /**
     * {@inheritDoc}
     */
    public function setDfmemoh2(?string $dfmemoh2)
    {
        $this->dfmemoh2 = $dfmemoh2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDfmemoh3(): ?string
    {
        return $this->dfmemoh3;
    }

    /**
     * {@inheritDoc}
     */
    public function setDfmemoh3(?string $dfmemoh3)
    {
        $this->dfmemoh3 = $dfmemoh3;

        return $this;
    }
}
