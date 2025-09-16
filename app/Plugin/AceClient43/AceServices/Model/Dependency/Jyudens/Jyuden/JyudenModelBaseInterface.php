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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyuden;

use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;
use Plugin\AceClient43\AceServices\Model\Dependency\Shukka;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;

/**
 * Interface for JyudenModelBase
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyudenModelBaseInterface extends Souko\HasSoukoInterface, Denpyo\HasTcodeInterface, Haiso\HasHcodeInterface, Haiso\HasHtimeInterface, OkuriAndNouhin\HasNosiInterface, OkuriAndNouhin\HasBunsyoInterface, Day\HasHdayInterface, Bikou\HasTwoNBikouInterface, Bikou\HasTwoOBikouInterface, Bikou\HasThreeDenBikouInterface, Free\HasThreeFmemoInterface, Cost\Souryou\HasSouryouInterface, Cost\Nebiki\HasNebikiInterface, Cost\Tesuu\HasTesuuInterface, Shukka\HasSKbnInterface
{
}
