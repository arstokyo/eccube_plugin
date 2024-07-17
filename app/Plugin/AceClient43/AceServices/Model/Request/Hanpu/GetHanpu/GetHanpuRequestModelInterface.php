<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\GetHanpu;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface GetHanpuRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GetHanpuRequestModelInterface extends RequestModelInterface,
                                                     NoCategory\HasIdInterface,
                                                     NoCategory\HasSessIdInterface
{
}