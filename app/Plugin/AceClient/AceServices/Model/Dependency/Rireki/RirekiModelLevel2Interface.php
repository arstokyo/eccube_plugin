<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Point;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Okuri;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient\AceServices\Model\Dependency\Free;


/**
 * Interface for RirekiLevel2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RirekiModelLevel2Interface extends Good\HasGcodeInterface,
                                        Good\HasTankaInterface,
                                        Denpyo\Jyuden\HasJdayInterface,
                                        Payment\HasPcodeInterface,
                                        Payment\HasPnameInterface,
                                        Haiso\HasHcodeInterface,
                                        Point\HasPointMInterface,
                                        Point\HasPointPInterface,
                                        Cost\Tax\HasUtaxInterface,
                                        Cost\Tax\HasStaxInterface,
                                        Okuri\HasOkurinoInterface,
                                        Haiso\HasHnameInterface,
                                        NoCategory\HasSdateInterface,
                                        Haiso\HasHdayInterface,
                                        Haiso\HasHkNameInterface,
                                        Denpyo\HasDenkuInterface,
                                        GiftAndCampaign\HasCKbnInterface,
                                        NoCategory\HasMcodeInterface,
                                        Denpyo\HasDennoInterface,
                                        GiftAndCampaign\HasGiftNoInterface,
                                        Denpyo\Jyuden\HasDayInterface,
                                        Denpyo\Jyuden\HasLineInterface,
                                        Free\HasThreeFcodeInterface,
                                        Denpyo\HasThreeDenBikouInterface,
                                        Free\HasThreeFmemoInterface
{

}