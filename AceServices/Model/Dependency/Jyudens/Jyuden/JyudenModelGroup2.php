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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;
use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Model for Jyuden Group2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenModelGroup2 implements JyudenModelGroup2Interface
{
    use JyudenModelBaseTrait;
    use NoCategory\IdTrait;
    use GiftAndCampaign\GiftNoTrait;
    use Denpyo\DenkuTrait;
    use Denpyo\MemIdTrait;
    use Day\DayModelGroup1Trait;
    use Nmember\NcodeTrait;
    use Nmember\NadrTrait;
    use OkuriAndNouhin\OkuriSuuTrait;
    use OkuriAndNouhin\OkuriNoTrait;
    use OkuriAndNouhin\OkuriNusiTrait;
    use Good\GtotalTrait;
    use Cost\TTotalTrait;
    use Cost\SyoukeiTrait;
    use Cost\TotalTrait;
    use Cost\Tax\TaxTrait;
    use Cost\Tax\UTTotalTrait;
    use Cost\Tax\UtaxTrait;
    use Cost\Tax\HTTotalTrait;
    use Cost\Tax\TaxTotalTrait;
    use Cost\Souryou\SouryouZnTrait;
    use Cost\Tesuu\TesuuZnTrait;
    use Cost\Nebiki\NebikiZnTrait;

    /** @var ?float 税抜き商品合計 */
    protected ?float $gtotalzn = null;

    /** @var ?int 返品理由コード */
    protected ?int $hrcd = null;

    /** @var ?int 納品書印刷フラグ */
    protected ?int $nouhin = null;

    /** @var ?string 新規入力担当者コード */
    protected ?string $tncode = null;

    /** @var ?float 伝票調整額 */
    protected ?float $tyousei = null;

    /** @var ?int 出荷予定回数 */
    protected ?int $ydaysuu = null;

    /**
     * {@inheritDoc}
     */
    public function getGtotalzn(): ?float
    {
        return $this->gtotalzn;
    }

    /**
     * {@inheritDoc}
     */
    public function setGtotalzn(?string $gtotalzn)
    {
        $this->gtotalzn = NumberConverter::stringWithCommaToFloat($gtotalzn);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getHrcd(): ?int
    {
        return $this->hrcd;
    }

    /**
     * {@inheritDoc}
     */
    public function setHrcd(?int $hrcd)
    {
        $this->hrcd = $hrcd;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getNouhin(): ?int
    {
        return $this->nouhin;
    }

    /**
     * {@inheritDoc}
     */
    public function setNouhin(?int $nouhin)
    {
        $this->nouhin = $nouhin;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTncode(): ?string
    {
        return $this->tncode;
    }

    /**
     * {@inheritDoc}
     */
    public function setTncode(?string $tncode)
    {
        $this->tncode = $tncode;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTyousei(): ?float
    {
        return $this->tyousei;
    }

    /**
     * {@inheritDoc}
     */
    public function setTyousei(?string $tyousei)
    {
        $this->tyousei = NumberConverter::stringWithCommaToFloat($tyousei);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getYdaysuu(): ?int
    {
        return $this->ydaysuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setYdaysuu(?int $ydaysuu)
    {
        $this->ydaysuu = $ydaysuu;

        return $this;
    }
}
