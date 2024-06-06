<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetHktime;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetHktime Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHktimeRequestModelInterface extends RequestModelInterface,
                                                 NoCategory\HasIdInterface,
                                                 NoCategory\HasCodeInterface
{
}
