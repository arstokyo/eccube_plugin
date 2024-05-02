<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Address\FourAdrTrait;

/**
 * Trait for Person Level 2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel2Trait
{
    use FourAdrTrait;

    /** @var ?string $kana ふりがら */
    protected ?string $kana = null;

    /** @var ?string $simei 氏名 */
    protected ?string $simei = null;

    /** @var ?string $tel 電話番号 */
    protected ?string $tel = null;

    /** @var ?string $zip 郵便番号 */
    protected ?string $zip = null;

    /**
     * {@inheritDoc} 
     * 
     */
    public function getSimei(): ?string
    {
        return $this->simei;

    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function getTel(): ?string
    {
        return $this->tel;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function getZip(): ?string
    {
        return $this->zip;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function getKana(): ?string
    {
        return $this->kana;
    }


    /**
     * {@inheritDoc} 
     */
    public function setKana(?string $kana)
    {
        $this->kana = $kana;
        return $this;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setSimei(?string $simei)
    {
        $this->simei = $simei;
        return $this;
    
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setTel(?string $tel)
    {
        $this->tel = $tel;
        return $this;
    }
    
    /**
     * {@inheritDoc} 
     * 
     */
    public function setZip(?string $zip)
    {
        $this->zip = $zip;
        return $this;
    }

}