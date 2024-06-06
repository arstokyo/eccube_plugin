<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetGoodsFree;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Day;

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
