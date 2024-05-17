<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;

/**
 * Model for Jyumei Base
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait JyumeiModelBaseTrait
{
    use NoCategory\SuuTrait,
        Cost\Teika\TeikaTrait,
        Cost\RituTrait,
        Cost\Tanka\TankaTrait,
        Cost\Money\MoneyTrait,
        Bikou\MBikouTrait,
        Cost\Genka\GenkaTrait,
        Good\KpKbnTrait;
}