<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient\AceServices\Model\Dependency\Payment;
use Plugin\AceClient\AceServices\Model\Dependency\Card;
use Plugin\AceClient\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\Dependency\Point;

/**
 * Interface for JyusubModelBase
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyusubModelBaseInterface extends NoCategory\HasIdInterface,
                                           NoCategory\HasMcodeInterface,
                                           Denpyo\HasToriKbnInterface,
                                           Denpyo\HasDensyuInterface,
                                           Denpyo\HasScodeInterface,
                                           Denpyo\HasJcodeInterface,
                                           Denpyo\HasMemIdInterface,
                                           Payment\HasPcodeInterface,
                                           Bumon\HasBumonInterface,
                                           Card\CardModelLevel1Interface,
                                           Card\HasTwoBunKatuInterface,
                                           Baitai\HasBcodeInterface,
                                           Baitai\HasBkCodeInterface,
                                           Free\HasThreeFcodeInterface,
                                           Point\HasPointRituInterface

{

    /**
     * Get サンプル区分
     * 
     * @return ?int
     */
    public function getSmpkbn(): ?int;

    /**
     * Set サンプル区分
     * 
     * @param int|null $smpkbn
     * @return $this
     */
    public function setSmpkbn(?int $smpkbn);

}