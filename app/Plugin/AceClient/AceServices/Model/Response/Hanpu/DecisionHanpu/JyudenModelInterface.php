<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for JyudenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyudenModelInterface extends Jyudens\Jyuden\JyudenModelGroup2Interface,
                                       Denpyo\HasDennoInterface
{
}