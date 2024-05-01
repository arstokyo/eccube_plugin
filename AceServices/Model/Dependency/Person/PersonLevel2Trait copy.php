<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * PersonLevel1 Group 1 Abstract
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel2Trait 
{
    /** @var ?string $email メール */
    protected ?string $email = null;

    /** @var ?string $kana ふりがら */
    protected ?string $kana = null;

    /** @var ?string $simei 氏名 */
    protected ?string $simei = null;

    /** @var ?string $tel 電話番号 */
    protected ?string $tel = null;

    /** @var ?string $zip 郵便番号 */
    protected ?string $zip = null;

    /** @var ?string $adr1 住所1 */
    protected ?string $adr1 = null;

    /** @var ?string $adr2 住所2 */
    protected ?string $adr2 = null;

    /** @var ?string $adr3 住所3 */
    protected ?string $adr3 = null;

    /** @var ?string $adr4 住所4 */
    protected ?string $adr4 = null;

    /**
     * {@inheritDoc} 
     * 
     */
    public function getEmail(): ?string
    {
        return $this->email;
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
    public function setEmail(?string $email): parent
    {
        $this->email = $email;
        return $this;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setKana(?string $kana): parent
    {
        $this->kana = $kana;
        return $this;
    
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setSimei(?string $simei): parent
    {
        $this->simei = $simei;
        return $this;
    
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setTel(?string $tel): parent
    {
        $this->tel = $tel;
        return $this;
    }
    
    /**
     * {@inheritDoc} 
     * 
     */
    public function setZip(?string $zip): mixed
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function getAdr1(): ?string
    {
        return $this->adr1;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setAdr1(?string $adr1): parent
    {
        $this->adr1 = $adr1;
        return $this;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function getAdr2(): ?string
    {
        return $this->adr2;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setAdr2(?string $adr2): parent
    {
        $this->adr2 = $adr2;
        return $this;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function getAdr3(): ?string
    {
        return $this->adr3;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function setAdr3(?string $adr3): parent
    {
        $this->adr3 = $adr3;
        return $this;
    }

    /**
     * {@inheritDoc} 
     * 
     */
    public function getAdr4(): ?string
    {
        return $this->adr4;
    }

   /**
     * {@inheritDoc} 
     * @return parent
     */
    public function setAdr4(?string $adr4): parent
    {
        $this->adr4 = $adr4;
        return $this;
    }

}