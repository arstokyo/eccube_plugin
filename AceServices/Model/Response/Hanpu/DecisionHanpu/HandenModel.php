<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\DecisionHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Class for HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class HandenModel implements HandenModelInterface
{
    use Handen\HandenModelGroup1Trait,
        Handen\HandenModelGroup2Trait,
        Handen\ThreeDbikouhTrait,
        Handen\ThreeDfmemohTrait,
        Denpyo\DennoTrait;
}