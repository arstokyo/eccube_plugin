<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\GiftAndCampaign;

/**
 * Interface for JyumeiModelGroup2
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyumeiModelGroup2Interface extends JyumeiModelBaseInterface,
                                             Denpyo\HasLineInterface,
                                             Good\HasGNameInterface,
                                             GiftAndCampaign\HasCKbnInterface,
                                             Cost\Tax\HasTaxKbnInterface,
                                             Cost\Tanka\HasTInTankaInterface,
                                             Cost\Tanka\HasTOutTankaInterface,
                                             Cost\Tanka\HasTaxTankaInterface,
                                             Cost\Money\HasTInMoneyInterface,
                                             Cost\Money\HasTOutMoneyInterface,
                                             Cost\Money\HasTaxMoneyInterface
{
    
}