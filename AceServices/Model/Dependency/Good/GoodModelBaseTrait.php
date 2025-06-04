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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;

/**
 * Trait for GoodModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GoodModelBaseTrait
{
    use GNameTrait;
    use SubNameTrait;
    use NoCategory\KanaTrait;
    use GkbnTrait;
    use Shukka\SKbnTrait;

    /** @var ?string 単位 */
    protected ?string $tani = null;
    /** @var ?int 中止区分 */
    protected ?int $tkbn = null;
    /** @var ?int 掛率区分 */
    protected ?int $kake = null;
    /** @var ?int 在庫区分 */
    protected ?int $zkbn = null;
    /** @var ?string バーコード */
    protected ?string $barcode = null;

    /**
     * {@inheritDoc}
     */
    public function getTani(): ?string
    {
        return $this->tani;
    }

    /**
     * {@inheritDoc}
     */
    public function setTani(?string $tani)
    {
        $this->tani = $tani;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTkbn(): ?int
    {
        return $this->tkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setTkbn(?int $tkbn)
    {
        $this->tkbn = $tkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKake(): ?int
    {
        return $this->kake;
    }

    /**
     * {@inheritDoc}
     */
    public function setKake(?int $kake)
    {
        $this->kake = $kake;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getZkbn(): ?int
    {
        return $this->zkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setZkbn(?int $zkbn)
    {
        $this->zkbn = $zkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setBarcode(?string $barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }
}
