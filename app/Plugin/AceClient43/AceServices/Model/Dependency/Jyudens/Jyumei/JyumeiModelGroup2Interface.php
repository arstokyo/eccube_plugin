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
 * Interface for JyumeiModelGroup2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelGroup2Interface extends JyumeiModelBaseInterface, Denpyo\HasLineInterface, Good\HasGNameInterface, GiftAndCampaign\HasCKbnInterface, Cost\Tax\HasTaxKbnInterface, Cost\Tanka\HasTInTankaInterface, Cost\Tanka\HasTOutTankaInterface, Cost\Tanka\HasTaxTankaInterface, Cost\Money\HasTInMoneyInterface, Cost\Money\HasTOutMoneyInterface, Cost\Money\HasTaxMoneyInterface
{
}
