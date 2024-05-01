<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Abstract class for PersonLevel5 Group 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
class PersonLevel5G1Abstract extends PersonLevel4G1Abstract implements PersonLevel5G1Interface
{

    /** @var ?int $age 年齢 */
    protected ?int $age = null;

    /** @var ?string $baifileName 管理番号名称 */
    protected ?string $baifileName = null;

    /** @var ?string $baitaiName 媒体名称 */
    protected ?string $baitaiName = null;

    /** @var ?int $keikbn1 携帯区分1 */
    protected ?int $keikbn1 = null;

    /** @var ?int $keikbn2 携帯区分2 */
    protected ?int $keikbn2 = null;

    /** @var ?int $keikbn3 携帯区分3 */
    protected ?int $keikbn3 = null;

    /** @var ?int $keikbn4 携帯区分4 */
    protected ?int $keikbn4 = null;

    /** @var ?int $keikbn5 携帯区分5 */
    protected ?int $keikbn5 = null;

    /** @var ?int $pckbn1 PC区分1 */
    protected ?int $pckbn1 = null;

    /** @var ?int $pckbn2 PC区分2 */
    protected ?int $pckbn2 = null;

    /** @var ?int $pckbn3 PC区分3 */
    protected ?int $pckbn3 = null;

    /** @var ?int $pckbn4 PC区分4 */
    protected ?int $pckbn4 = null;

    /** @var ?int $pckbn5 PC区分5 */
    protected ?int $pckbn5 = null;

    /** @var ?int $blday 滞納者日付 */
    protected ?int $blday = null;

    /** @var ?int $blkbn 滞納者フラグ */
    protected ?int $blkbn = null;

    /** @var ?int $dadr DM送付先フラグ */
    protected ?int $dadr = null;

    /** @var ?int $gadr 商品送付先フラグ */
    protected ?int $gadr = null;

    /** @var ?int $point ポイント */
    protected ?int $point = null;

    /** @var ?string $fcodename1 フリーコード1名称 */
    protected ?string $fcodename1 = null;

    /** @var ?string $fcodename2 フリーコード2名称 */
    protected ?string $fcodename2 = null;

    /** @var ?string $fcodename3 フリーコード3名称 */
    protected ?string $fcodename3 = null;

    /** @var ?string $upcodeSimei 紹介者 氏名 */
    protected ?string $upcodeSimei = null;

    /**
     * {@inheritDoc}
     * 
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getBlday(): ?int
    {
        return $this->blday;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getBlkbn(): ?int
    {
        return $this->blkbn;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getDadr(): ?int
    {
        return $this->dadr;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getGadr(): ?int
    {
        return $this->gadr;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getPoint(): ?int
    {
        return $this->point;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setAge(?int $age): self
    {
        $this->age = $age;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBlday(?int $blday): self
    {
        $this->blday = $blday;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBlkbn(?int $blkbn): self
    {
        $this->blkbn = $blkbn;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setDadr(?int $dadr): self
    {
        $this->dadr = $dadr;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setGadr(?int $gadr): self
    {
        $this->gadr = $gadr;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setPoint(?int $point): self
    {
        $this->point = $point;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getBaifileName(): ?string
    {
        return $this->baifileName;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBaifileName(?string $baifileName): self
    {
        $this->baifileName = $baifileName;
        return $this;
    }

      /**
     * {@inheritDoc}
     * 
     */
    public function getBaitaiName(): ?string
    {
        return $this->baitaiName;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setBaitaiName(?string $baitaiName): self
    {
        $this->baitaiName = $baitaiName;
        return $this;
    }

         /**
     * {@inheritDoc}
     * 
     */
    public function getFCodeName1(): ?string
    {
        return $this->fcodename1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFCodeName1(?string $fcodename1): self
    {
        $this->fcodename1 = $fcodename1;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFCodeName2(): ?string
    {
        return $this->fcodename2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFCodeName2(?string $fcodename2): self
    {
        $this->fcodename2 = $fcodename2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getFCodeName3(): ?string
    {
        return $this->fcodename3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setFCodeName3(?string $fcodename3): self
    {
        $this->fcodename3 = $fcodename3;
        return $this;
    }

 
    /**
     * {@inheritDoc}
     * 
     */
    public function getKeiKbn1(): ?int
    {
        return $this->keikbn1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setKeiKbn1(?int $keiKbn1): self
    {
        $this->keikbn1 = $keiKbn1;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getKeiKbn2(): ?int
    {
        return $this->keikbn2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setKeiKbn2(?int $keiKbn2): self
    {
        $this->keikbn2 = $keiKbn2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getKeiKbn3(): ?int
    {
        return $this->keikbn3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setKeiKbn3(?int $keikbn3): self
    {
        $this->keikbn3 = $keikbn3;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getKeiKbn4(): ?int
    {
        return $this->keikbn4;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setKeiKbn4(?int $keikbn4): self
    {
        $this->keikbn4 = $keikbn4;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getKeiKbn5(): ?int
    {
        return $this->keikbn5;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setKeiKbn5(?int $keikbn5): self
    {
        $this->keikbn5 = $keikbn5;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getPckbn1(): ?int
    {
        return $this->pckbn1;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setPckbn1(?int $pckbn1): self
    {
        $this->pckbn1 = $pckbn1;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getPckbn2(): ?int
    {
        return $this->pckbn2;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setPckbn2(?int $pckbn2): self
    {
        $this->pckbn2 = $pckbn2;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getPckbn3(): ?int
    {
        return $this->pckbn3;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setPckbn3(?int $pckbn3): self
    {
        $this->pckbn3 = $pckbn3;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getPckbn4(): ?int
    {
        return $this->pckbn4;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setPckbn4(?int $pckbn4): self
    {
        $this->pckbn4 = $pckbn4;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getPckbn5(): ?int
    {
        return $this->pckbn5;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setPckbn5(?int $pckbn5): self
    {
        $this->pckbn5 = $pckbn5;
        return $this;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getUpcodeSimei(): ?string
    {
        return $this->upcodeSimei;
    }
    
    /**
     * {@inheritDoc}
     * 
     */
    public function setUpcodeSimei(?string $upcodeSimei): self
    {
        $this->upcodeSimei = $upcodeSimei;
        return $this;
    }

}