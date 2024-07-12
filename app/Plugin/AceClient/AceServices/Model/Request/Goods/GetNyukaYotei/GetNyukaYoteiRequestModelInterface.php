<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetNyukaYotei;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetNyukaYoteiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetNyukaYoteiRequestModelInterface extends RequestModelInterface,
                                                     NoCategory\HasIdInterface,
                                                     Good\HasGdidInterface
{
    /**
     * Get 倉庫ID
     *
     * @return ?string
     */
    public function getSkid(): ?string;

    /**
     * Set 倉庫ID
     *
     * @param ?string $skid
     * @return $this
     */
    public function setSkid(?string $skid);
}