<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for HanmeiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HanmeiModelInterface extends Hanmei\HanmeiModelBaseInterface,
                                       NoCategory\HasIdInterface,
                                       Denpyo\HasDennoInterface
{
}