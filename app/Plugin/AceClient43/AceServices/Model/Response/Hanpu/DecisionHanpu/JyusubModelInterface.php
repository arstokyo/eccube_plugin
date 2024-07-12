<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for JyusubModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyusubModelInterface extends Jyudens\Jyusub\JyusubModelBaseInterface,
                                       Denpyo\HasDennoInterface
{
}