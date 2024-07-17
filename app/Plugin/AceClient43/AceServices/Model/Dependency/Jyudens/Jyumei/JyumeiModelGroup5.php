<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;

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