<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelInterface extends Handen\HandenModelGroup1Interface,
                                       Handen\HandenModelGroup2Interface,
                                       Handen\HasThreeDbikouhInterface,
                                       Handen\HasThreeDfmemohInterface,
                                       Denpyo\HasDennoInterface
{
}