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

use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Model for Jyumei Group2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyumeiModelGroup2 implements JyumeiModelGroup2Interface
{
    use JyumeiModelBaseTrait;
    use Denpyo\LineTrait;
    use Good\GNameTrait;
    use GiftAndCampaign\CKbnTrait;
    use Cost\Tax\TaxKbnTrait;
    use Cost\Tanka\TInTankaTrait;
    use Cost\Tanka\TOutTankaTrait;
    use Cost\Tanka\TaxTankaTrait;
    use Cost\Money\TInMoneyTrait;
    use Cost\Money\TOutMoneyTrait;
    use Cost\Money\TaxMoneyTrait;
}
