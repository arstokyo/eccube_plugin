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
                                     Bikou\HasThreeNotesInterface,
                                     NoCategory\HasKubunInterface
{
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