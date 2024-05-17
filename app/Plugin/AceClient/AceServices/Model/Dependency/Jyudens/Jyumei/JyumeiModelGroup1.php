<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Model for Jyumei Group1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModelGroup1 implements JyumeiModelGroup1Interface
{
    use Good\GcodeTrait,
        NoCategory\SuuTrait,
        Cost\Tanka\TankaTrait,
        Zaiko\IgnoreZaikoTrait,
        Zaiko\ChoseiZaikoTrait,
        Bikou\MBikouTrait,
        Cost\Teika\TeikaTrait,
        Cost\RituTrait,
        Cost\Money\MoneyTrait,
        Cost\Tax\TaxKbnTrait,
        Cost\Genka\GenkaTrait,
        Good\KpKbnTrait;
}