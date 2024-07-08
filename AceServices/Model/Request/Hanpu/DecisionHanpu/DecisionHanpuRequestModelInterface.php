<?php

namespace Plugin\AceClient\AceServices\Model\Request\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

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