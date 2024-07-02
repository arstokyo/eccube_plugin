<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemberFreeMemo;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetMemberFreeMemo Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemberFreeMemoRequestModelInterface extends RequestModelInterface,
                                                        NoCategory\HasIdInterface
{
}
