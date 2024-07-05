<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsBunrui;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Interface for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodsModelInterface extends NoCategory\HasNameInterface,
                                      Bikou\HasThreeNotesInterface
{
    /**
     * Get 分類区分
     *
     * @return ?string
     */
    public function getKubun(): ?string;

    /**
     * Set 分類区分
     *
     * @param ?string $kubun
     * @return $this
     */
    public function setKubun(?string $kubun): static;

    /**
     * Get 分類ID
     *
     * @return ?string
     */
    public function getFcid(): ?string;

    /**
     * Set 分類ID
     *
     * @param ?string $fcid
     * @return $this
     */
    public function setFcid(?string $fcid): static;
}