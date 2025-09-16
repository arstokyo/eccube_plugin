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
 * Trait For 3つ住所備考
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait ThreeAdrBikouTrait
{
    /** @var string|null 住所備考1 */
    protected ?string $adrbikou1 = null;

    /** @var ?string 住所備考2 */
    protected ?string $adrbikou2 = null;

    /** @var ?string 住所備考3 */
    protected ?string $adrbikou3 = null;

    /**
     * {@inheritDoc}
     */
    public function getAdrBikou1(): ?string
    {
        return $this->adrbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrBikou1(?string $adrbikou1)
    {
        $this->adrbikou1 = $adrbikou1;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdrBikou2(): ?string
    {
        return $this->adrbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrBikou2(?string $adrbikou2)
    {
        $this->adrbikou2 = $adrbikou2;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdrBikou3(): ?string
    {
        return $this->adrbikou3;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrBikou3(?string $adrbikou3)
    {
        $this->adrbikou3 = $adrbikou3;

        return $this;
    }
}
