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

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for JyusubModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyusubModelInterface extends Jyudens\Jyusub\JyusubModelBaseInterface, Card\CardModelLevel3Interface, Card\GMO\GMOModelGroup1Interface, NoCategory\HasSessIdInterface, Denpyo\HasWebOrderNoInterface
{
    /**
     * Get SPS顧客ID
     *
     * @return string|null
     */
    public function getSpscustomerid(): ?string;

    /**
     * Set SPS顧客ID
     *
     * @param string|null $spscustomerid
     *
     * @return $this
     */
    public function setSpscustomerid(?string $spscustomerid);

    /**
     * Get SPSトラッキングID
     *
     * @return string|null
     */
    public function getSpstid(): ?string;

    /**
     * Set SPSトラッキングID
     *
     * @param string|null $spstid
     *
     * @return $this
     */
    public function setSpstid(?string $spstid);

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
