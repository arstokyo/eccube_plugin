<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;


/**
 * Interface for JyumeiModelGroup1
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyumeiModelGroup1Interface extends Good\HasGcodeInterface,
                                             NoCategory\HasSuuInterface,
                                             Cost\Tanka\HasTankaInterface,
                                             Zaiko\HasIgnoreZaikoInterface,
                                             Zaiko\HasChoseiZaikoInterface,
                                             Bikou\HasMBikouInterface,
                                             Cost\Teika\HasTeikaInterface,
                                             Cost\HasRituInterface,
                                             Cost\Money\HasMoneyInterface,
                                             Cost\Tax\HasTaxKbnInterface,
                                             Cost\Genka\HasGenkaInterface,
                                             Good\HasKpkbnInterface
{

}