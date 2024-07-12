<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

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