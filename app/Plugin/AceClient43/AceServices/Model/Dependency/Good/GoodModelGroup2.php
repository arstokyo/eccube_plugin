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

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Class for GoodModelGroup2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModelGroup2 implements GoodModelGroup2Interface
{
    use GoodModelBaseTrait;
    use NoCategory\TwoImagesTrait;
    use Cost\Tanka\NineTankaTrait;
    use Free\ThreeFcodeTrait;
    use Free\ThreeFnameTrait;
    use Free\ThreeFmemoTrait;
    use Free\ThreeFdayTrait;
    use Free\ThreeFreeTrait;
    use Cost\Tax\TaxKbnTrait;
    use ReizouTrait;
    use ReitouTrait;
    use JyouonTrait;
    use GcodeTrait;
    use Point\PointTrait;
    use Zaiko\ZaikoTrait;

    /** @var ?string 大分類コード */
    protected ?string $dbun = null;

    /** @var ?string 大分類コード名称 */
    protected ?string $dbunname = null;

    /** @var ?string 中分類コード */
    protected ?string $tbun = null;

    /** @var ?string 中分類コード名称 */
    protected ?string $tbunname = null;

    /** @var ?string 小分類コード */
    protected ?string $sbun = null;

    /** @var ?string 小分類コード名称 */
    protected ?string $sbunname = null;

    /** @var ?string 備考 */
    protected ?string $bikou = null;

    /** @var ?string 棚番号 */
    protected ?string $tanano = null;

    /** @var ?int 確保数 */
    protected ?int $kakuho = null;

    /** @var ?int 梱包数 */
    protected ?int $konpo = null;

    /** @var ?int 掛売顧客税 */
    protected ?int $otaxkbn = null;

    /** @var ?int 総額端数 */
    protected ?int $sougakuhkbn = null;

    /** @var ?int ポイント掛率対象区分 */
    protected ?int $pointkake = null;

    /**
     * {@inheritDoc}
     */
    public function getDbun(): ?string
    {
        return $this->dbun;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbun(?string $dbun)
    {
        $this->dbun = $dbun;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDbunname(): ?string
    {
        return $this->dbunname;
    }

    /**
     * {@inheritDoc}
     */
    public function setDbunname(?string $dbunname)
    {
        $this->dbunname = $dbunname;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTbun(): ?string
    {
        return $this->tbun;
    }

    /**
     * {@inheritDoc}
     */
    public function setTbun(?string $tbun)
    {
        $this->tbun = $tbun;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTbunname(): ?string
    {
        return $this->tbunname;
    }

    /**
     * {@inheritDoc}
     */
    public function setTbunname(?string $tbunname)
    {
        $this->tbunname = $tbunname;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSbun(): ?string
    {
        return $this->sbun;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbun(?string $sbun)
    {
        $this->sbun = $sbun;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSbunname(): ?string
    {
        return $this->sbunname;
    }

    /**
     * {@inheritDoc}
     */
    public function setSbunname(?string $sbunname)
    {
        $this->sbunname = $sbunname;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBikou(): ?string
    {
        return $this->bikou;
    }

    /**
     * {@inheritDoc}
     */
    public function setBikou(?string $bikou)
    {
        $this->bikou = $bikou;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTanano(): ?string
    {
        return $this->tanano;
    }

    /**
     * {@inheritDoc}
     */
    public function setTanano(?string $tanano)
    {
        $this->tanano = $tanano;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKakuho(): ?int
    {
        return $this->kakuho;
    }

    /**
     * {@inheritDoc}
     */
    public function setKakuho(?int $kakuho)
    {
        $this->kakuho = $kakuho;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getKonpo(): ?int
    {
        return $this->konpo;
    }

    /**
     * {@inheritDoc}
     */
    public function setKonpo(?int $konpo)
    {
        $this->konpo = $konpo;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOtaxkbn(): ?int
    {
        return $this->otaxkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setOtaxkbn(?int $otaxkbn)
    {
        $this->otaxkbn = $otaxkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSougakuhkbn(): ?int
    {
        return $this->sougakuhkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setSougakuhkbn(?int $sougakuhkbn)
    {
        $this->sougakuhkbn = $sougakuhkbn;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPointkake(): ?int
    {
        return $this->pointkake;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointkake(?int $pointkake)
    {
        $this->pointkake = $pointkake;

        return $this;
    }
}
