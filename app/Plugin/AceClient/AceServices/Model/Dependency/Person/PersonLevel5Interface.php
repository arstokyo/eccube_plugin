<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

use Plugin\AceClient\AceServices\Model\Dependency\Baitai\HasBaitaiNameInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Free\HasThreeFnameInterface;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC\HasFivePCKbnInterface;
use Plugin\AceClient\AceServices\Model\Dependency\PhoneAndPC\HasFiveKeiKbnInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\HasFiveMailInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Mail\HasMailInterface;
use Plugin\AceClient\AceServices\Model\Dependency\Point\HasPointInterface;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime\AceDateTimeInterface;

/**
 * Interface for Person Level 5
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PersonLevel5Interface extends HasBaitaiNameInterface, HasThreeFnameInterface,
                                        HasFiveKeiKbnInterface, HasFivePCKbnInterface,
                                        HasFiveMailInterface, HasPointInterface,
                                        HasMailInterface
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
     * @return $this
     */
    public function setBlkbn(?int $blkbn): static;
    /**
     * Get 滞納者日付.
     *
     * @return AceDateTimeInterface|null
     */
    public function getBlday(): ?AceDateTimeInterface;
    /**
     * Set 滞納者日付.
     *
     * @param \DateTime|string|null $blday
     * @return $this
     */
    public function setBlday(\DateTime|string|null $blday): static;
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
     * @return $this
     */
    public function setDadr(?int $dadr): static;
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
     * @return $this
     */
    public function setGadr(?int $gadr): static;
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
     * @return $this
     */
    public function setAge(?int $age): static;
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
     * @return $this
     */
    public function setUpcodeSimei(?string $upcodeSimei): static;

}