<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface For HasFreeMemo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeMemoInterface extends NoCategory\HasKubunInterface
{
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