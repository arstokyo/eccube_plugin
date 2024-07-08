<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\GetHanpuRireki;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

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