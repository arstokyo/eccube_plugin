<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\GetPointRireki;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

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