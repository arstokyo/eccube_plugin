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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;

/**
 * Model for RirekiLevel2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RirekiModelLevel2 extends RirekiModelLevel1 implements RirekiModelLevel2Interface
{
    use Good\GcodeTrait;
    use Good\GNameTrait;
    use NoCategory\SuuTrait;
    use Cost\Tanka\TankaTrait;
    use Cost\Money\MoneyTrait;
    use Day\JdayTrait;
    use Payment\PcodeTrait;
    use Payment\PnameTrait;
    use Haiso\HcodeTrait;
    use Cost\Tax\UtaxTrait;
    use Cost\Tax\StaxTrait;
    use Haiso\HnameTrait;
    use Haiso\HkNameTrait;
    use Denpyo\DenkuTrait;
    use GiftAndCampaign\CKbnTrait;
    use Good\GkbnTrait;
    use NoCategory\McodeTrait;
    use Bikou\MBikouTrait;
    use GiftAndCampaign\GiftNoTrait;
    use Denpyo\DenkuNumTrait;
    use Denpyo\LineTrait;
    use Free\ThreeFcodeTrait;
    use Bikou\ThreeDenBikouTrait;
    use Bikou\TwoNBikouTrait;
    use Bikou\TwoOBikouTrait;
    use Free\ThreeFmemoTrait;
    use Haiso\HaisoModelGroup1Trait;
    use Denpyo\JnameTrait;
}
