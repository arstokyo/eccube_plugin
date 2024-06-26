<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Model for Jyuden Group1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenModelGroup1 implements JyudenModelGroup1Interface
{
    use JyudenModelBaseTrait,
        Denpyo\ToriKbnTrait,
        Denpyo\JcodeTrait,
        Denpyo\WebOrderNoTrait,
        Day\DayTrait,
        Payment\PcodeTrait,
        Baitai\BcodeTrait,
        Baitai\BkCodeTrait,
        Bumon\BumonTrait,
        Free\ThreeFcodeTrait,
        Point\PointMTrait,
        GiftAndCampaign\CampaignTrait;

}