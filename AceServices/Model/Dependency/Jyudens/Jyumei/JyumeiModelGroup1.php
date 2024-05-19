<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Model for Jyumei Group1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModelGroup1 implements JyumeiModelGroup1Interface
{
    use JyumeiModelBaseTrait,
        Zaiko\IgnoreZaikoTrait,
        Zaiko\ChoseiZaikoTrait,
        Cost\Tax\TaxKbnTrait,
        Cost\Teika\TeikaTrait,
        Cost\RituTrait,
        Cost\Genka\GenkaTrait;
}