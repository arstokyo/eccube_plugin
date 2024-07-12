<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\GetPointRireki;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetPointRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetPointRirekiRequestModelInterface extends RequestModelInterface,
                                                      NoCategory\HasSyidInterface,
                                                      NoCategory\HasJmemidInterface
{
}