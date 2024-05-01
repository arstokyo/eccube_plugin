<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Baitai\HasBaitaiNameInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFNameInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Pc\HasFivePckbnInterface;
use Plugin\AceClient\AceServices\Model\Dependency\KeiTai\HasFiveKeiKbnInterface;

/**
 * Interface for Person Level5 Group 1
 *
 * @target : /Member/Service2.asmx/regMember|response-smember
 */
interface PersonLevel5G1Interface extends PersonLevel4G1Interface, HasBaitaiNameInterface, HasThreeFNameInterface, HasFiveKeiKbnInterface, HasFivePckbnInterface
{

    /**
     * Get 滞納者フラグ.
     *
     * @return int|null 
     */
    public function getBlkbn(): ?int;


    /**
     * Set 滞納者フラグ.
     *
     * @param int|null $blkbn 
     * @return self
     */
    public function setBlkbn(?int $blkbn): self;

    /**
     * Get 滞納者日付.
     *
     * @return int|null 
     */
    public function getBlday(): ?int;

    /**
     * Set 滞納者日付.
     *
     * @param int|null $blday 
     * @return self
     */
    public function setBlday(?int $blday): self;

    /**
     * Get ポイント.
     *
     * @return int|null 
     */
    public function getPoint(): ?int;

    /**
     * Set ポイント.
     *
     * @param int|null $point 
     * @return self
     */
    public function setPoint(?int $point): self;

    /**
     * Get DM送付先フラグ.
     * 0:自宅 1:勤務先
     *
     * @return int|null 
     */
    public function getDadr(): ?int;

    /**
     * Set DM送付先フラグ.
     * 0:自宅 1:勤務先
     *
     * @param int|null $dadr 
     * @return self
     */
    public function setDadr(?int $dadr): self;

    /**
     * Get 商品送付先フラグ.
     * 0:自宅 1:勤務先
     *
     * @return int|null 
     */
    public function getGadr(): ?int;

    /**
     * Set 商品送付先フラグ.
     * 0:自宅 1:勤務先
     *
     * @param int|null $gadr 
     * @return self
     */
    public function setGadr(?int $gadr): self;

        /**
     * Get 年齢.
     *
     * @return int|null 
     */
    public function getAge(): ?int;

    /**
     * Set 年齢.
     *
     * @param int|null $age 
     * @return self
     */
    public function setAge(?int $age): self;

    /**
     * Get 紹介者 氏名.
     *
     * @return string|null 
     */
    public function getUpcodeSimei(): ?string;

    /**
     * Set 紹介者 氏名.
     *
     * @param string|null $upcodeSimei 
     * @return self
     */
    public function setUpcodeSimei(?string $upcodeSimei): self;

}