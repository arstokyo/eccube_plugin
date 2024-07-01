<?php
namespace Plugin\AceClient\AceServices\Model\Response\Goods\GetGoodsMany;

use Plugin\AceClient\AceServices\Model\Dependency\Good;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Zaiko;

/**
 * Class for GoodModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class GoodModel implements GoodModelInterface
{
    use Good\GdidTrait,
    Good\GNameTrait,
    Cost\Tanka\NineTankaTrait,
    Zaiko\ZaikoTrait;
}