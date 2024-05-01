<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use \Plugin\AceClient\AceServices\Model\Dependency\Mail\MemMailModel;

/**
 * Abstract class PersonLevel4 Group 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PersonLevel4G1Abstract extends PersonLevel3G1Abstract implements PersonLevel4G1Interface
{

    /** @var ?int $birthday 生年月日 */
    protected ?int $birthday = null;

    /** @var ?string $code2 顧客コード */
    protected ?string $code2 = null;

    /** @var ?string $tel2 電話番号 */
    protected ?string $tel2 = null;

    /** @var ?int $torikbn 取引区分 */
    protected ?int $torikbn = null;

    /** @var ?string $upcode 紹介者 */
    protected ?string $upcode = null;

    /** @var ?string $free1 フリー1 */
    protected ?string $free1 = null;

    /** @var ?string $free2 フリー2 */
    protected ?string $free2 = null;

    /** @var ?string $free3 フリー3 */
    protected ?string $free3 = null;

    /** @var ?string $baifile 媒体管理番号コード */
    protected ?string $baifile = null;

    /** @var ?string $baitai 媒体コード */
    protected ?string $baitai = null;

    /** @var ?int $fday1 フリー日付1 */
    protected ?int $fday1 = null;

    /** @var ?int $fday2 フリー日付2 */
    protected ?int $fday2 = null;

    /** @var ?int $fday3 フリー日付3 */
    protected ?int $fday3 = null;

    /** @var ?string $fmemo1 フリーメモ1 */
    protected ?string $fmemo1 = null;

    /** @var ?string $fmemo2 フリーメモ2 */
    protected ?string $fmemo2 = null;

    /** @var ?string $fmemo3 フリーメモ3 */
    protected ?string $fmemo3 = null;

    /** @var ?string $fcode1 フリーコード1 */
    protected ?string $fcode1 = null;

    /** @var ?string $fcode2 フリーコード2 */
    protected ?string $fcode2 = null;

    /** @var ?string $fcode3 フリーコード3 */
    protected ?string $fcode3 = null;

    /** @var ?MemMailModel $memmail メール */
    protected ?MemMailModel $memmail = null;

    /** @var ?int $dmkb DM区分 */
    protected ?int $dmkb = null;

    /** @var ?string $fax FAX */
    protected ?string $fax = null;

    /** @var ?int $inday 入会日 */
    protected ?int $inday = null;

    /** @var ?int $khasuu 掛率端数処理区分 */
    protected ?int $khasuu = null;

    /** @var ?int $ritu 掛け率 */
    protected ?int $ritu = null;

    /** @var ?int $sex 性別 */
    protected ?int $sex = null;

    /** @var ?int $sime 締日 */
    protected ?int $sime = null;

    /** @var ?int $site 入金サイト */
    protected ?int $site = null;

    /** @var ?int $tankakbn 単価区分 */
    protected ?int $tankakbn = null;

    /**
     * {@inheritDoc}
     * 
     */
    public function getBirthday(): ?int
    {
        return $this->birthday;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBirthday(?int $birthday): self
    {
        $this->birthday = $birthday;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getCode2(): ?string
    {
        return $this->code2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setCode2(?string $code2): self
    {
        $this->code2 = $code2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getTorikbn(): ?int
    {
        return $this->torikbn;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setTorikbn(?int $torikbn): self
    {
        $this->torikbn = $torikbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getUpcode(): ?string
    {
        return $this->upcode;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setUpcode(?string $upcode): self
    {
        $this->upcode = $upcode;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFree1(): ?string
    {
        return $this->free1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFree1(?string $free1): \Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFreeInterface
    {
        $this->free1 = $free1;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFree2(): ?string
    {
        return $this->free2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFree2(?string $free2): self
    {
        $this->free2 = $free2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFree3(): ?string
    {
        return $this->free3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFree3(?string $free3): self
    {
        $this->free3 = $free3;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getBaifile(): ?string
    {
        return $this->baifile;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBaifile(?string $baifile): self
    {
        $this->baifile = $baifile;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getBaitai(): ?string
    {
        return $this->baitai;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBaitai(?string $baitai): self
    {
        $this->baitai = $baitai;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFday1(): ?int
    {
        return $this->fday1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFday1(?int $fday1): self
    {
        $this->fday1 = $fday1;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFday2(): ?int
    {
        return $this->fday2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFday2(?int $fday2): self
    {
        $this->fday2 = $fday2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFday3(): ?int
    {
        return $this->fday3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFday3(?int $fday3): self
    {
        $this->fday3 = $fday3;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFMemo1(): ?string
    {
        return $this->fmemo1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFMemo1(?string $fmemo1): self
    {
        $this->fmemo1 = $fmemo1;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFMemo2(): ?string
    {
        return $this->fmemo2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFMemo2(?string $fmemo2): self
    {
        $this->fmemo2 = $fmemo2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFMemo3(): ?string
    {
        return $this->fmemo3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFMemo3(?string $fmemo3): self
    {
        $this->fmemo3 = $fmemo3;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFCode1(): ?string
    {
        return $this->fcode1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFCode1(?string $freeCode1)
    {
        $this->fcode1 = $freeCode1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFCode2(): ?string
    {
        return $this->fcode2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFCode2(?string $freeCode2)
    {
        $this->fcode2 = $freeCode2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFCode3(): ?string
    {
        return $this->fcode3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFCode3(?string $freeCode3)
    {
        $this->fcode3 = $freeCode3;
    }

  

    /**
     * {@inheritDoc}
     * 
     */
    public function getMemmail(): ?MemMailModel
    {
        return $this->memmail;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setMemmail(?MemMailModel $memmail): self
    {
        $this->memmail = $memmail;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getDmkb(): ?int
    {
        return $this->dmkb;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setDmkb(?int $dmkb): self
    {
        $this->dmkb = $dmkb;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFax(): ?string
    {
        return $this->fax;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFax(?string $fax): self
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getInday(): ?int
    {
        return $this->inday;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setInday(?int $inday): self
    {
        $this->inday = $inday;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getKhasuu(): ?int
    {
        return $this->khasuu;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setKhasuu(?int $khasuu): self
    {
        $this->khasuu = $khasuu;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getRitu(): ?int
    {
        return $this->ritu;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setRitu(?int $ritu): self
    {
        $this->ritu = $ritu;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getSex(): ?int
    {
        return $this->sex;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setSex(?int $sex): self
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getSime(): ?int
    {
        return $this->sime;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setSime(?int $sime): self
    {
        $this->sime = $sime;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getSite(): ?int
    {
        return $this->site;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setSite(?int $site): self
    {
        $this->site = $site;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getTankakbn(): ?int
    {
        return $this->tankakbn;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setTankakbn(?int $tankakbn): self
    {
        $this->tankakbn = $tankakbn;
        return $this;
    }

}