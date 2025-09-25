<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Interface for JyusubModelBase
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyusubModelBaseInterface extends NoCategory\HasIdInterface, NoCategory\HasMcodeInterface, Denpyo\HasToriKbnInterface, Denpyo\HasDensyuInterface, Denpyo\HasScodeInterface, Denpyo\HasJcodeInterface, Denpyo\HasMemIdInterface, Payment\HasPcodeInterface, Bumon\HasBumonInterface, Card\CardModelLevel1Interface, Card\HasTwoBunKatuInterface, Baitai\HasBcodeInterface, Baitai\HasBkCodeInterface, Free\HasThreeFcodeInterface, Point\HasPointRituInterface
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
     *
     * @return $this
     */
    public function setSmpkbn(?int $smpkbn);
}
