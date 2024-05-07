<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Person\NmemberAbstract;
use Plugin\AceClient\AceServices\Model\Dependency\Address\FourAdrTrait;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou\ThreeAdrBikouTrait;

/**
 * Class For Nmem Model Group1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class NmemGroup1 extends NmemberAbstract implements NmemGroup1Interface
{
    use PersonLevel1Trait,
        FourAdrTrait,
        ThreeAdrBikouTrait;

    /** @var ?string $adrName 氏名 */
    protected ?string $adrName = null;

    /** @var ?string $fax ファックス */
    protected ?string $fax = null;

    /** @var ?string $tel 電話番号 */
    protected ?string $tel = null;

    /** @var ?string $zip 郵便番号 */
    protected ?string $zip = null;

    /**
     * {@inheritDoc}
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * {@inheritDoc}
     */
    public function setFax(?string $fax)
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTel(): ?string
    {
        return $this->tel;
    }

    /**
     * {@inheritDoc}
     */
    public function setTel(?string $tel)
    {
        $this->tel = $tel;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * {@inheritDoc}
     */
    public function setZip(?string $zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAdrName(): string|null
    {
        return $this->adrName;
    }

    /**
     * {@inheritDoc}
     */
    public function setAdrName(?string $adrName)
    {
        $this->adrName = $adrName;
        return $this;
    }

}