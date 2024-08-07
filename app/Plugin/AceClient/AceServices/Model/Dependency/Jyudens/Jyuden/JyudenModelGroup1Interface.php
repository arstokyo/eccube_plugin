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
 * Interface for JyudenModelGroup1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenModelGroup1Interface extends JyudenModelBaseInterface,
                                             Denpyo\HasToriKbnInterface,
                                             Denpyo\HasJcodeInterface,
                                             Denpyo\HasWebOrderNoInterface,
                                             Day\HasDayInterface,
                                             Payment\HasPcodeInterface,
                                             Baitai\HasBcodeInterface,
                                             Baitai\HasBkCodeInterface,
                                             Bumon\HasBumonInterface,
                                             Free\HasThreeFcodeInterface,
                                             Point\HasPointMInterface,
                                             GiftAndCampaign\HasCampaignInterface
{

}