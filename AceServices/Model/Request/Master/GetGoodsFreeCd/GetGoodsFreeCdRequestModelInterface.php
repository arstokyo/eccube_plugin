<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetGoodsFreeCd;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetGoodsFreeCd Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsFreeCdRequestModelInterface extends RequestModelInterface,
                                                       NoCategory\HasIdInterface
{
}
