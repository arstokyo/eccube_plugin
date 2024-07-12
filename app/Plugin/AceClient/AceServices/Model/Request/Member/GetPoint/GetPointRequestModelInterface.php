<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetPoint;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetPointRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPointRequestModelInterface extends RequestModelInterface,
                                           NoCategory\HasIdInterface,
                                           NoCategory\HasMcodeInterface
{
}