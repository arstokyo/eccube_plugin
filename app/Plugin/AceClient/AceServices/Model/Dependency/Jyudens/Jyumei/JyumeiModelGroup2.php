<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Model for Jyumei Group2
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModelGroup2 implements JyumeiModelGroup2Interface
{
    use JyumeiModelBaseTrait,
        Denpyo\LineTrait,
        Good\GNameTrait,
        GiftAndCampaign\CKbnTrait,
        Cost\Tax\TaxKbnTrait,
        Cost\Tanka\TInTankaTrait,
        Cost\Tanka\TOutTankaTrait,
        Cost\Tanka\TaxTankaTrait,
        Cost\Money\TInMoneyTrait,
        Cost\Money\TOutMoneyTrait,
        Cost\Money\TaxMoneyTrait;
}