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
 * Interface for JyumeiModelGroup4
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelGroup4Interface extends JyumeiModelGroup2Interface,
                                             NoCategory\HasIdInterface,
                                             Denpyo\HasDennoInterface,
                                             Denpyo\HasDenkuInterface,
                                             GiftAndCampaign\HasGiftNoInterface,
                                             Day\HasDayInterface,
                                             Day\HasSdayInterface,
                                             Souko\HasSoukoInterface,
                                             Point\HasPointInterface,
                                             Shukka\HasSKbnInterface
{

}