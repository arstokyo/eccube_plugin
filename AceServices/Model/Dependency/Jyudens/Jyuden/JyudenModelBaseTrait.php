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
 * Trait for JyudenModelBase
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait JyudenModelBaseTrait
{
    use Souko\SoukoTrait;
    use Denpyo\TcodeTrait;
    use Haiso\HcodeTrait;
    use Haiso\HtimeTrait;
    use OkuriAndNouhin\NosiTrait;
    use OkuriAndNouhin\BunsyoTrait;
    use Day\HdayTrait;
    use Bikou\TwoNBikouTrait;
    use Bikou\TwoOBikouTrait;
    use Bikou\ThreeDenBikouTrait;
    use Free\ThreeFmemoTrait;
    use Cost\Souryou\SouryouTrait;
    use Cost\Nebiki\NebikiTrait;
    use Cost\Tesuu\TesuuTrait;
    use Shukka\SKbnTrait;
}
