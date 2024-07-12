<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Rireki;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\GiftAndCampaign;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;


/**
 * Model for RirekiLevel2
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
class RirekiModelLevel2 extends RirekiModelLevel1 implements RirekiModelLevel2Interface
{
    use Good\GcodeTrait,
        Good\GNameTrait,
        NoCategory\SuuTrait,
        Cost\Tanka\TankaTrait,
        Cost\Money\MoneyTrait,
        Day\JdayTrait,
        Payment\PcodeTrait,
        Payment\PnameTrait,
        Haiso\HcodeTrait,
        Cost\Tax\UtaxTrait,
        Cost\Tax\StaxTrait,
        Haiso\HnameTrait,
        Haiso\HkNameTrait,
        Denpyo\DenkuTrait,
        GiftAndCampaign\CKbnTrait,
        Good\GkbnTrait,
        NoCategory\McodeTrait,
        Bikou\MBikouTrait,
        GiftAndCampaign\GiftNoTrait,
        Denpyo\DenkuNumTrait,
        Denpyo\LineTrait,
        Free\ThreeFcodeTrait,
        Bikou\ThreeDenBikouTrait,
        Bikou\TwoNBikouTrait,
        Bikou\TwoOBikouTrait,
        Free\ThreeFmemoTrait,
        Haiso\HaisoModelGroup1Trait,
        Denpyo\JnameTrait;
}