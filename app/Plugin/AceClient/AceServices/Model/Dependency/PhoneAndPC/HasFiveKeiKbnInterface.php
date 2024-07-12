<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface For 5つ携帯電話区分
 *
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
     * @param ?int $keikbn1
     * @return $this
     */
    public function setKeiKbn1(?int $keikbn1);

    /**
     * Get 携帯電話区分2
     *
     * @return ?int
     */
    public function getKeiKbn2(): ?int;

    /**
     * Set 携帯電話区分2
     *
     * @param ?int $keikbn2
     * @return $this
     */
    public function setKeiKbn2(?int $keikbn2);

    /**
     * Get 携帯電話区分3
     *
     * @return ?int
     */
    public function getKeiKbn3(): ?int;

    /**
     * Set 携帯電話区分3
     *
     * @param ?int $keikbn3
     * @return $this
     */
    public function setKeiKbn3(?int $keikbn3);

    /**
     * Get 携帯電話区分4
     *
     * @return ?int
     */
    public function getKeiKbn4(): ?int;

    /**
     * Set 携帯電話区分4
     *
     * @param ?int $keikbn4
     * @return $this
     */
    public function setKeiKbn4(?int $keikbn4);

    /**
     * Get 携帯電話区分5
     *
     * @return ?int
     */
    public function getKeiKbn5(): ?int;

    /**
     * Set 携帯電話区分5
     *
     * @param ?int $keikbn5
     * @return $this
     */
    public function setKeiKbn5(?int $keikbn5);
}