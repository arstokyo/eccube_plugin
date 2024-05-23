<?php

namespace Plugin\AceClient\AceServices\Model\Request\Goods\GetGoods;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Day;

/**
 * Interface GetGoodsRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsRequestModelInterface extends RequestModelInterface,
                                           NoCategory\HasIdInterface,
                                           Day\HasExecDateFromInterface,
                                           Day\HasExecDateToInterface
{
}