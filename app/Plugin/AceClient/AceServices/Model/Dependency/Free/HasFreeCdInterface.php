<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Free;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface For FreeCd
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeCdInterface extends NoCategory\HasNameInterface,
                                     Bikou\HasThreeNotesInterface
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
    public function getFcid(): ?string;

    /**
     * Set フリーマスタID
     *
     * @param ?string $fcid
     * @return $this
     */
    public function setFcid(?string $fcid);
}