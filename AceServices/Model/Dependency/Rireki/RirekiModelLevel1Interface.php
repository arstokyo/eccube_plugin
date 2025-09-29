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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Interface for RirekiLevel1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface RirekiModelLevel1Interface extends Day\HasDayInterface, Denpyo\HasDennoInterface, Denpyo\HasDenkuInterface, Denpyo\HasDenKbnInterface, Denpyo\HasJnameInterface, OkuriAndNouhin\HasOkuriNoInterface, Day\HasSdateInterface, Point\HasPointPInterface, Point\HasPointMInterface, Day\HasHdayInterface
{
}
