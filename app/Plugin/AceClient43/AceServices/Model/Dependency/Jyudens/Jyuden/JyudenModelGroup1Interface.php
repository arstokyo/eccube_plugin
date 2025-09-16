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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Interface for JyudenModelGroup1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenModelGroup1Interface extends JyudenModelBaseInterface, Denpyo\HasToriKbnInterface, Denpyo\HasJcodeInterface, Denpyo\HasWebOrderNoInterface, Day\HasDayInterface, Payment\HasPcodeInterface, Baitai\HasBcodeInterface, Baitai\HasBkCodeInterface, Bumon\HasBumonInterface, Free\HasThreeFcodeInterface, Point\HasPointMInterface, GiftAndCampaign\HasCampaignInterface
{
}
