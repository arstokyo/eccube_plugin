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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;

/**
 * Model for Jyumei Group4
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModelGroup4 extends JyumeiModelGroup2 implements JyumeiModelGroup4Interface
{
    use NoCategory\IdTrait;
    use Denpyo\DennoTrait;
    use Denpyo\DenkuTrait;
    use GiftAndCampaign\GiftNoTrait;
    use Day\DayTrait;
    use Day\SdayTrait;
    use Souko\SoukoTrait;
    use Point\PointTrait;
    use Shukka\SKbnTrait;
}
