<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\KeiTai;

/**
 * Interface For 携帯電話区分
 * 
 * @Target : Plugin\AceClient\AceServices\Model\Dependency\Person
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFiveKeiKbnInterface
{
    /**
     * Get 携帯電話区分1
     * 
     * @return ?int
     */
    public function getKeiKbn1(): ?int;

    /**
     * Set 携帯電話区分1
     * 
     * @param ?int $keiKbn1
     * @return self
     */
    public function setKeiKbn1(?int $keiKbn1): self;

    /**
     * Get 携帯電話区分2
     * 
     * @return ?int
     */
    public function getKeiKbn2(): ?int;

    /**
     * Set 携帯電話区分2
     * 
     * @param ?int $keiKbn2
     * @return self
     */
    public function setKeiKbn2(?int $keiKbn2): self;

    /**
     * Get 携帯電話区分3
     * 
     * @return ?int
     */
    public function getKeiKbn3(): ?int;

    /**
     * Set 携帯電話区分3
     * 
     * @param ?int $keiKbn3
     * @return self
     */
    public function setKeiKbn3(?int $keiKbn3): self;

    /**
     * Get 携帯電話区分4
     * 
     * @return ?int
     */
    public function getKeiKbn4(): ?int;

    /**
     * Set 携帯電話区分4
     * 
     * @param ?int $keiKbn4
     * @return self
     */
    public function setKeiKbn4(?int $keiKbn4): self;

    /**
     * Get 携帯電話区分5
     * 
     * @return ?int
     */
    public function getKeiKbn5(): ?int;

    /**
     * Set 携帯電話区分5
     * 
     * @param ?int $keiKbn5
     * @return self
     */
    public function setKeiKbn5(?int $keiKbn5): self;
}