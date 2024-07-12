<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoodsBunrui;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetGoodsBunruiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsBunruiRequestModelInterface extends RequestModelInterface,
                                                      NoCategory\HasIdInterface
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
    public function setKubun(?string $kubun);
}