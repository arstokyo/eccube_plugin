<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Hanmei;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

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