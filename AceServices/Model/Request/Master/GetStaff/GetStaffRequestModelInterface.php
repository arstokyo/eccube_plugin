<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetStaff;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetStaff Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetStaffRequestModelInterface extends RequestModelInterface,
                                                NoCategory\HasIdInterface
{
}
