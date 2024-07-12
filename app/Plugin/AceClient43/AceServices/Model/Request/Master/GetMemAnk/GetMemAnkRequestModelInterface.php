<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Master\GetMemAnk;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetMemAnk Request Model
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetMemAnkRequestModelInterface extends RequestModelInterface,
                                                 NoCategory\HasIdInterface,
                                                 NoCategory\HasMbidInterface
{
}
