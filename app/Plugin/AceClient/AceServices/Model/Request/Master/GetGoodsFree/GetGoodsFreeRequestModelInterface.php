<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetGoodsFree;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Interface GetGoodsFree Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetGoodsFreeRequestModelInterface extends RequestModelInterface,
                                                    NoCategory\HasIdInterface,
                                                    Day\HasExecDateFromInterface,
                                                    Day\HasExecDateToInterface
{
}
