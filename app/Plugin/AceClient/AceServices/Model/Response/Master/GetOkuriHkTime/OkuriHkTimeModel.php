<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Response\Master\GetOkuriHkTime;

/**
 * Implement for Okuri Hk Time Response Model
 * 
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */


class OkuriHkTimeModel implements OkuriHkTimeModelInterface
{
    use Haiso\OcodeTrait, 
    Haiso\OnameTrait, 
    Haiso\OsubnameTrait, 
    Denpyo\DenkuNumTrait, 
    Haiso\HcodeTrait, 
    Haiso\HnameTrait, 
    Good\JyouonTrait,  
    Good\ReizouTrait, 
    Good\ReitouTrait, 
    Haiso\HkCodeTrait, 
    Haiso\HkNameTrait; 

    // OCODE: 

    public function getOcode(): ?int {
        return $this->ocode;
    }

    public function setOcode(?int $ocode): static {
        $this->ocode = $ocode;
        return $this;
    }

    // ONAME:

    public function getOname(): ?string {
        return $this->oname;
    }

    public function setOname(?string $oname): static {
        $this->oname = $oname;
        return $this;
    }

    // OSUBNAME:

    public function getOsubname(): ?string {
        return $this->osubname;
    }

    public function setOsubname(?string $osubname): static {
        $this->osubname = $osubname;
        return $this;
    }

    // KUBUN:

    public function getDenkuNum(): ?int {
        return $this->denkuNum;
    }
    
    public function setDenkuNum(?int $denkuNum): static {
        $this->denkuNum = $denkuNum;
        return $this;
    }

    // HCODE:

    public function getHCode(): ?int {
        return $this->hcode;
    }

    public function setHCode(?int $hCode): static {
        $this->hcode = $hCode;
        return $this;
    }

    // HNAME:

    public function getHName(): ?string {
        return $this->hname;
    }

    public function setHName(?string $hName): static {
        $this->hname = $hName;
        return $this;
    }

    // JYOUON:

    public function getJyouon(): ?int {
        return $this->jyouon;
    }

    public function setJyouon(?int $jyouon): static {
        $this->jyouon = $jyouon;
        return $this;
    }

    // REIZOU:

    public function getReizou(): ?int {
        return $this->reizou;
    }

    public function setReizou(?int $reizou): static {
        $this->reizou = $reizou;
        return $this;
    }

    // REITOU:
    
    public function getReitou(): ?int {
        return $this->reitou;
    }

    public function setReitou(?int $reitou): static {
        $this->reitou = $reitou;
        return $this;
    }
    
    // HKCODE:

    public function getHkCode(): ?int {
        return $this->hkCode;
    }

    public function setHkCode(?int $hkCode): static {
        $this->hkCode = $hkCode;
        return $this;
    }

    // HKNAME:

    public function getHkName(): ?string {
        return $this->hkName;
    }

    public function setHkName(?string $hkName): static {
        $this->hkName = $hkName;
        return $this;
    }

}