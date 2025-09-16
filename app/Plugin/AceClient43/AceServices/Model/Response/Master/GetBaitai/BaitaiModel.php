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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaitai;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Class BaitaiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class BaitaiModel implements BaitaiModelInterface
{
    use NoCategory\NameTrait;
    use Good\SubNameTrait;
    use NoCategory\CodeTrait;

    /** @var ?string 分類コード */
    protected ?string $bun = null;

    /** @var ?string フリーコード１ */
    protected ?string $fcode1 = null;

    /** @var ?string フリーコード２ */
    protected ?string $fcode2 = null;

    /** @var ?int 表示／非表示 */
    protected ?int $dispkbn = null;

    /**
     * {@inheritDoc}
     */
    public function getBun(): ?string
    {
        return $this->bun;
    }

    /**
     * {@inheritDoc}
     */
    public function setBun(?string $bun)
    {
        $this->bun = $bun;

        return $this;
    }

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
    public function getDispkbn(): ?int
    {
        return $this->dispkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setDispkbn(?int $dispkbn)
    {
        $this->dispkbn = $dispkbn;

        return $this;
    }
}
