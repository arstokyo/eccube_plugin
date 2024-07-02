<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;


/**
 * Interface For HasFreeMemo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeMemoInterface
{
    /**
     * Get フリー項目区分
     *
     * @return ?int
     */
    public function getKubun(): ?int;

    /**
     * Set フリー項目区分
     *
     * @param ?int $kubun
     * @return $this
     */
    public function setKubun(?int $kubun);

    /**
     * Get フリーマスタID
     *
     * @return ?string
     */
    public function getFoid(): ?string;

    /**
     * Set フリーマスタID
     *
     * @param ?string $foid
     * @return $this
     */
    public function setFoid(?string $foid);

    /**
     * Get メモ
     *
     * @return ?string
     */
    public function getMemo(): ?string;

    /**
     * Set メモ
     *
     * @param ?string $memo
     * @return $this
     */
    public function setMemo(?string $memo);
}