<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;


/**
 * Interface for GoodModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodModelInterface extends Good\HasGdidInterface,
                                           Good\HasGNameInterface,
                                           Cost\Tanka\HasNineTankaInterface,
                                           Zaiko\HasZaikoInterface
{
}