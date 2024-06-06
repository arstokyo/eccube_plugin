<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetGoodsFreemst;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetGoodsFreemst Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsFreemstRequestModelInterface extends RequestModelInterface,
                                                       NoCategory\HasIdInterface
{
}
