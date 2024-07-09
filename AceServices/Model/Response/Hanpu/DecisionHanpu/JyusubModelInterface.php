<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for JyusubModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyusubModelInterface extends Jyudens\Jyusub\JyusubModelBaseInterface,
                                       Denpyo\HasDennoInterface
{
}