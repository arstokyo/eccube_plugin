<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs;

use Plugin\AceClient\AceServices\Model\Response\Member\GetHaisoAdrs\GetHaisouAdrsModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\EdaTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\ZipTrait;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory\TelTrait;

/**
 * Class GetPointRequestModel
 *
 * @author kmorino
 */

class GetHaisouAdrsModel implements GetHaisouAdrsModelInterface
{

    use EdaTrait; // 納品先住所枝番号
    use ZipTrait; // 郵便番号
    use TelTrait; // 電話

    /**
     * getHaisoAdrs 配送先情報
     *
     * @var string $code 会員番号
     * @var string $adrname 氏名
     * @var string $adr1 住所1
     * @var string $adr2 住所2
     * @var string $adr3 住所3
     * @var string $adr4 住所4
     * @var string $area 地域コード
     * @var string $cbar カスタマ＾コード
     * @var string $adrbikou1 備考1
     * @var string $adrbikou2 備考2
     * @var string $adrbikou3 備考3
     * @var string $cnvname 氏名
     * @var string $cnvadr1 住所1
     * @var string $cnvadr2 住所2
     * @var string $cnvadr3 住所3
     * @var string $cnvadr4 住所4
     */
    protected ?string $code = null;
    protected ?string $adrname = null;
    protected ?string $adr1 = null;
    protected ?string $adr2 = null;
    protected ?string $adr3 = null;
    protected ?string $adr4 = null;
    protected ?string $area = null;
    protected ?string $cbar = null;
    protected ?string $adrbikou1 = null;
    protected ?string $adrbikou2 = null;
    protected ?string $adrbikou3 = null;
    protected ?string $cnvname = null;
    protected ?string $cnvadr1 = null;
    protected ?string $cnvadr2 = null;
    protected ?string $cnvadr3 = null;
    protected ?string $cnvadr4 = null;

    /**
     * {@inheritDoc}
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * {@inheritDoc}
     */
    public function getcode(): string
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrname(?string $adrname): void
    {
        $this->adrname = $adrname;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdrname(): string
    {
        return $this->adrname;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr1(?string $adr1): void
    {
        $this->adr1 = $adr1;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdr2(): string
    {
        return $this->adr2;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr2(?string $adr2): void
    {
        $this->adr2 = $adr2;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdr3(): string
    {
        return $this->adr3;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr3(?string $adr3): void
    {
        $this->adr3 = $adr3;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdr4(): string
    {
        return $this->adr4;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdr4(?string $adr4): void
    {
        $this->adr4 = $adr4;
    }

    /**
     * {@inheritDoc}
     */
    public function getArea(): string
    {
        return $this->area;
    }

    /**
     * {@inheritDoc}
     */
    public function setArea(?string $area): void
    {
        $this->area = $area;
    }

    /**
     * {@inheritDoc}
     */
    public function getCbar(): string
    {
        return $this->cbar;
    }

    /**
     * {@inheritDoc}
     */
    public function setCbar(?string $cbar): void
    {
        $this->cbar = $cbar;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdrbikou1(): string
    {
        return $this->adrbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrbikou1(?string $adrbikou1): void
    {
        $this->adrbikou1 = $adrbikou1;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdrbikou2(): string
    {
        return $this->adrbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrbikou2(?string $adrbikou2): void
    {
        $this->adrbikou2 = $adrbikou2;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdrbikou3(): string
    {
        return $this->adrbikou3;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrbikou3(?string $adrbikou3): void
    {
        $this->adrbikou3 = $adrbikou3;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvname(): string
    {
        return $this->cnvname;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvname(?string $cnvname): void
    {
        $this->cnvname = $cnvname;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvadr1(): string
    {
        return $this->cnvadr1;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvadr1(?string $cnvadr1): void
    {
        $this->cnvadr1 = $cnvadr1;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvadr2(): string
    {
        return $this->cnvadr2;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvadr2(?string $cnvadr2): void
    {
        $this->cnvadr2 = $cnvadr2;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvadr3(): string
    {
        return $this->cnvadr3;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvadr3(?string $cnvadr3): void
    {
        $this->cnvadr3 = $cnvadr3;
    }

    /**
     * {@inheritDoc}
     */
    public function getCnvadr4(): string
    {
        return $this->cnvadr4;
    }

    /**
     * {@inheritDoc}
     */
    public function setCnvadr4(?string $cnvadr4): void
    {
        $this->cnvadr4 = $cnvadr4;
    }
}