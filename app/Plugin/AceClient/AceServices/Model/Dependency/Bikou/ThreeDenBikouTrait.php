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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bikou;

/**
 * Trait for ThreeDenBikou
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait ThreeDenBikouTrait
{
    /** @var ?string 伝票備考1 */
    protected ?string $dbikou1 = null;

    /** @var ?string 伝票備考2 */
    protected ?string $dbikou2 = null;

    /** @var ?string 伝票備考3 */
    protected ?string $dbikou3 = null;

    /**
     * {@inheritDoc}
     */
    public function getDbikou1(): ?string
    {
        return $this->dbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikou1(?string $dbikou1)
    {
        $this->dbikou1 = $dbikou1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikou2(): ?string
    {
        return $this->dbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikou2(?string $dbikou2)
    {
        $this->dbikou2 = $dbikou2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbikou3(): ?string
    {
        return $this->dbikou3;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbikou3(?string $dbikou3)
    {
        $this->dbikou3 = $dbikou3;

        return $this;
    }
}
