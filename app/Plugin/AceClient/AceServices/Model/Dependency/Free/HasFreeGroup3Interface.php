<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

/**
 * Interface For HasFreeGroup3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeGroup3Interface
{
    /**
     * Get ファイル区分
     *
     * @return ?int
     */
    public function getFrkbn(): ?int;

    /**
     * Set ファイル区分
     *
     * @param ?int $frkbn
     * @return $this
     */
    public function setFrkbn(?int $frkbn): static;

    /**
     * Get キー情報
     *
     * @return ?string
     */
    public function getFrkey(): ?string;

    /**
     * Set キー情報
     *
     * @param ?string $frkey
     * @return $this
     */
    public function setFrkey(?string $frkey): static;

    /**
     * Get フリー項目区分
     *
     * @return ?int
     */
    public function getFmkbn(): ?int;

    /**
     * Set フリー項目区分
     *
     * @param ?int $fmkbn
     * @return $this
     */
    public function setFmkbn(?int $fmkbn): static;

    /**
     * Get フリー内容
     *
     * @return ?string
     */
    public function getFree(): ?string;

    /**
     * Set フリー内容
     *
     * @param ?string $free
     * @return $this
     */
    public function setFree(?string $free): static;
}