<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;


/**
 * Interface for GoodModelGroup3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface GoodModelGroup3Interface extends HasGdidInterface,
                                           HasGNameInterface,
                                           Cost\Tanka\HasNineTankaInterface,
                                           Zaiko\HasZaikoInterface
{
}