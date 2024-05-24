<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Good;

use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Class for GoodModelGroup3
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModelGroup3 implements GoodModelGroup3Interface
{
    use GdidTrait,
    GNameTrait,
    Cost\Tanka\NineTankaTrait,
    Zaiko\ZaikoTrait;
}