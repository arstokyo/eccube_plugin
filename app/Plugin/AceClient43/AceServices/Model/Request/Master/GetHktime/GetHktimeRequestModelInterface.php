<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetHktime;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

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
