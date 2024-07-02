<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetBumonFree;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Day;

/**
 * Interface GetBumonFree Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetBumonFreeRequestModelInterface extends RequestModelInterface,
                                                    NoCategory\HasIdInterface,
                                                    Day\HasExecDateFromInterface,
                                                    Day\HasExecDateToInterface
{
}
