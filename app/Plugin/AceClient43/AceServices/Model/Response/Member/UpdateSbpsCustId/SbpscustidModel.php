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

namespace Plugin\AceClient43\AceServices\Model\Response\Member\UpdateSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Model for Sbpscustid
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class SbpscustidModel implements SbpscustidModelInterface
{
    use Day\DayTrait;
    use NoCategory\MbidTrait;
    use Card\CedaTrait;
    use NoCategory\CustidTrait;
}
