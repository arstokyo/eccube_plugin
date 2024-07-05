<?php

namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetNyukaYotei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime;

/**
 * Interface for GoodsModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodsModelInterface extends Good\HasGdidInterface,
                                      NoCategory\HasNameInterface,
                                      NoCategory\HasSuuInterface
{
    /**
    * Get 入荷予定日
    *
    * @return ?AceDateTime\AceDateTimeInterface
    */
    public function getNyday(): ?AceDateTime\AceDateTimeInterface;

    /**
     * Set 入荷予定日
     *
     * @param \DateTime|string|null $nyday
     * @return $this
     */
    public function setNyday(\DateTime|string|null $nyday): static;
}