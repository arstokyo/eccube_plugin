<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFreeCd;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetMemberFreeCd Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberFreeCdRequestModelInterface extends RequestModelInterface,
                                                       NoCategory\HasIdInterface
{
}
