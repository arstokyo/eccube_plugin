<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\GetHanpuRireki;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetHanpuRirekiRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHanpuRirekiRequestModelInterface extends RequestModelInterface,
                                                      NoCategory\HasIdInterface,
                                                      NoCategory\HasMcodeInterface
{
}