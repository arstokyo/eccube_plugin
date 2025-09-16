<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoodsBunrui;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetGoodsBunruiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsBunruiRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface
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
     *
     * @return $this
     */
    public function setKubun(?string $kubun);
}
