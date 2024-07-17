<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface DecisionHanpuRequestModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DecisionHanpuRequestModelInterface extends RequestModelInterface,
                                                     NoCategory\HasIdInterface,
                                                     NoCategory\HasSessIdInterface
{
}