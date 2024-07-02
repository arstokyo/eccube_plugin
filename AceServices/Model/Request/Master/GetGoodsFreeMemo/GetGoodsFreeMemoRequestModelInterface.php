<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetGoodsFreeMemo;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetGoodsFreeMemo Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsFreeMemoRequestModelInterface extends RequestModelInterface,
                                                       NoCategory\HasIdInterface
{
}
