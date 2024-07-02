<?php

namespace Plugin\AceClient\AceServices\Model\Response\Master\GetPcode;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for PcodeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface PcodeModelInterface extends NoCategory\HasCodeInterface,
                                      NoCategory\HasNameInterface
{
    /**
     * Get 入金予定方法の通販プロ上の説明
     *
     * @return ?string
     */
    public function getPcodeSyurui(): ?string;

    /**
     * Set 入金予定方法の通販プロ上の説明
     *
     * @param ?string $pcodeSyurui
     * @return $this
     */
    public function setPcodeSyurui(?string $pcodeSyurui);

    /**
     * Get Web公開区分
     *
     * @return ?string
     */
    public function getMemo(): ?string;

    /**
     * Set Web公開区分
     *
     * @param ?string $memo
     * @return $this
     */
    public function setMemo(?string $memo);
}