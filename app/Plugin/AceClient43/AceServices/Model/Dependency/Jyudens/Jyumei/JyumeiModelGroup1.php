<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

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