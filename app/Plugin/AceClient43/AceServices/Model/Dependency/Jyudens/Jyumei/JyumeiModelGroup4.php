<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;

/**
 * Model for Jyumei Group4
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModelGroup4 extends JyumeiModelGroup2 implements JyumeiModelGroup4Interface
{
    use NoCategory\IdTrait,
        Denpyo\DennoTrait,
        Denpyo\DenkuTrait,
        GiftAndCampaign\GiftNoTrait,
        Day\DayTrait,
        Day\SdayTrait,
        Souko\SoukoTrait,
        Point\PointTrait,
        Shukka\SKbnTrait;

}