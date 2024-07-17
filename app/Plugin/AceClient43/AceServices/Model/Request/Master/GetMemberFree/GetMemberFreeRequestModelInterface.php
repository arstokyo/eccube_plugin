<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetMemberFree;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetMemberFree Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberFreeRequestModelInterface extends RequestModelInterface,
                                                     NoCategory\HasIdInterface,
                                                     NoCategory\HasMbidInterface
{
}
