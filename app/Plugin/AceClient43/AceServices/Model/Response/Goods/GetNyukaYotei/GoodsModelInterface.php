<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetNyukaYotei;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime;

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
    public function getNyday();

    /**
     * Set 入荷予定日
     *
     * @param \DateTime|string|null $nyday
     * @return $this
     */
    public function setNyday($nyday);
}