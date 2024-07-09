<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Model for Jyumei Group5
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class JyumeiModelGroup5 implements JyumeiModelGroup5Interface
{
    use JyumeiModelGroup3Trait,
        Denpyo\LineTrait,
        Good\GcodeTrait,
        Good\GNameTrait,
        NoCategory\SuuTrait,
        Cost\Tanka\TankaTrait,
        GiftAndCampaign\CKbnTrait;
}