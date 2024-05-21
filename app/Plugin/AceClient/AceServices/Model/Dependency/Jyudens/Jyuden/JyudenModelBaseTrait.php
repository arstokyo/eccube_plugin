<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient\AceServices\Model\Dependency\Souko;
use Plugin\AceClient\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient\AceServices\Model\Dependency\Free;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;

/**
 * Trait for JyudenModelBase
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JyudenModelBaseTrait 
{
    use Souko\SoukoTrait,
        Denpyo\TcodeTrait,
        Haiso\HcodeTrait,
        Haiso\HtimeTrait,
        OkuriAndNouhin\NosiTrait,
        OkuriAndNouhin\BunsyoTrait,
        Day\HdayTrait,
        Bikou\TwoNBikouTrait,
        Bikou\TwoOBikouTrait,
        Bikou\ThreeDenBikouTrait,
        Free\ThreeFmemoTrait,
        Cost\Souryou\SouryouTrait,
        Cost\Nebiki\NebikiTrait,
        Cost\Tesuu\TesuuTrait,
        Shukka\SKbnTrait;

}