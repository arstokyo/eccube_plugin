<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetBumonFreeMemo;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetBumonFreeMemo Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetBumonFreeMemoRequestModelInterface extends RequestModelInterface,
                                                       NoCategory\HasIdInterface
{
}
