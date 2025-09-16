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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Jyudens\Jyusub;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Interface for JyusubModelGroup1
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface JyusubModelGroup1Interface extends JyusubModelBaseInterface, Card\CardModelLevel2Interface, Card\CardModelLevel3Interface, Point\HasPointMaxInterface, Denpyo\HasWebOrderNoInterface
{
    /**
     * Get 通販プロ伝票番号
     *
     * @return ?int
     */
    public function getTpdenno(): ?int;

    /**
     * Set 通販プロ伝票番号
     *
     * @param int|null $tpdenno
     *
     * @return $this
     */
    public function setTpdenno(?int $tpdenno);
}
