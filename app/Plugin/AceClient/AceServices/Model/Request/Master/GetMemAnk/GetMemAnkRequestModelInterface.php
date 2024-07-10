<?php

namespace Plugin\AceClient\AceServices\Model\Request\Master\GetMemAnk;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

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
