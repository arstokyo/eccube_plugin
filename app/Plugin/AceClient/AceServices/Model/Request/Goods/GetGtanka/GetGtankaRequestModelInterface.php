<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Goods\GetGtanka;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;


/**
 * Interface GetGtankaRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGtankaRequestModelInterface extends RequestModelInterface,
                                                 NoCategory\HasIdInterface,
                                                 Day\HasExecDateFromInterface,
                                                 Day\HasExecDateToInterface
{
}