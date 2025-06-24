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

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGoods;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

/**
 * Interface GetGoodsRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsRequestModelInterface extends RequestModelInterface, NoCategory\HasIdInterface, Day\HasExecDateFromInterface, Day\HasExecDateToInterface
{
    /**
     * Get Options (JSON string)
     *
     * @return ?string
     */
    public function getOptions(): ?string;

    /**
     * Set Options (JSON string)
     *
     * @param ?string $options Valid JSON string
     *
     * @return $this
     *
     * @throws \InvalidArgumentException if options is not valid JSON
     */
    public function setOptions(?string $options);
}
