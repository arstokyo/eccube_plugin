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
 * Interface for JyudenModelBase
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenModelBaseInterface extends Souko\HasSoukoInterface, 
                                           Denpyo\HasTcodeInterface,
                                           Haiso\HasHcodeInterface,
                                           Haiso\HasHtimeInterface,
                                           OkuriAndNouhin\HasNosiInterface,
                                           OkuriAndNouhin\HasBunsyoInterface,
                                           Day\HasHdayInterface,
                                           Bikou\HasTwoNBikouInterface,
                                           Bikou\HasTwoOBikouInterface,
                                           Bikou\HasThreeDenBikouInterface,
                                           Free\HasThreeFmemoInterface,
                                           Cost\Souryou\HasSouryouInterface,
                                           Cost\NeBiki\HasNebikiInterface,
                                           Cost\Tesuu\HasTesuuInterface,
                                           Shukka\HasSKbnInterface
{

}