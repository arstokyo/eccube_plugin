<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Okuri;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;
use Plugin\AceClient\Utils\Converter\NumberConverter;


/**
 * Model for RirekiLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RirekiLevel1Model extends Haiso\HaisoGroupModel1 implements RirekiLevel1ModelInterface
{
    use Denpyo\Jyuden\DayTrait,
        Denpyo\DennoTrait,
        Payment\PnameTrait,
        Denpyo\DenkuTrait,
        Okuri\OkurinoTrait,
        NoCategory\SdateTrait,
        Good\GtotalTrait,
        Haiso\SouRyouTrait,
        Cost\TesuuTrait,
        Good\NebikiTrait,
        Point\PointPTrait,
        Point\PointMTrait,
        Denpyo\Jyuden\SdayTrait,
        Denpyo\Jyuden\UdayTrait,
        Denpyo\Jyuden\NdayTrait,
        Denpyo\Jyuden\ZandakaTrait,
        Haiso\HdayTrait;

    /** @var ?int $rno 行番号 */
    protected ?int $rno = null;

    /** @var ?int $maxrow 行数 */
    protected ?int $maxrow = null;

    /** @var ?string $jname 受注方法 */
    protected ?string $jname = null;

    /** @var ?int $total 伝票合計額 */
    protected ?int $total = null;

    /** @var ?string $denkbn 伝票区分 */
    protected ?string $denkbn = null;

    /** @var ?string $url URL */
    protected ?string $url = null;

    /** @var ?int $syoukei 小計 */
    protected ?int $syoukei = null;


    /**
     * {@inheritDoc}
     */
    public function setSday(\DateTime|string|null $sday)
    {
        $this->sday = AceDateTime\AceDateTimeFactory::makeAceDateTime($sday,"YmdHis");
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setDay(\DateTime|string|null $day)
    {
        $this->day = AceDateTime\AceDateTimeFactory::makeAceDateTime($day,"YmdHis");
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getRno(): ?int
    {
        return $this->rno;
    }

    /**
     * {@inheritDoc}
     */
    public function setRno(?int $rno)
    {
        $this->rno = $rno;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getMaxrow(): ?int
    {
        return $this->maxrow;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaxrow(?int $maxrow)
    {
        $this->maxrow = $maxrow;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getJname(): ?string
    {
        return $this->jname;
    }

    /**
     * {@inheritDoc}
     */
    public function setJname(?string $jname)
    {
        $this->jname = $jname;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotal(?int $total)
    {
        $this->total = $total;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDenkbn(): ?string
    {
        return $this->denkbn;
    }

    /**
     * {@inheritDoc}
     */
    public function setDenkbn(?string $denkbn)
    {
        $this->denkbn = $denkbn;
        return $this;
    }


    /**
     * {@inheritDoc}
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * {@inheritDoc}
     */
    public function setUrl(?string $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getSyoukei(): ?int
    {
        return $this->syoukei;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyoukei(?int $syoukei)
    {
        $this->syoukei = $syoukei;
        return $this;
    }

}