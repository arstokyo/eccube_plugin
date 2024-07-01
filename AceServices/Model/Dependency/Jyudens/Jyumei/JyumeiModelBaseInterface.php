<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyumei;

use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient\AceServices\Model\Dependency\Good;

/**
 * Interface for JyumeiModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyumeiModelBaseInterface extends NoCategory\HasSuuInterface,
                                           Cost\Tanka\HasTankaInterface,
                                           Cost\Money\HasMoneyInterface,
                                           Bikou\HasMBikouInterface,
                                           Good\HasGcodeInterface
{
}