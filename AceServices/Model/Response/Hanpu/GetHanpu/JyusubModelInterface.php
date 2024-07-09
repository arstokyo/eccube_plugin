<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Jyudens;
use Plugin\AceClient\AceServices\Model\Dependency\Card;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Denpyo;


/**
 * Interface for JyusubModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface JyusubModelInterface extends Jyudens\Jyusub\JyusubModelBaseInterface,
                                       Card\CardModelLevel3Interface,
                                       Card\GMO\GMOModelGroup1Interface,
                                       NoCategory\HasSessIdInterface,
                                       Denpyo\HasWebOrderNoInterface
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
     * @return $this
     */
    public function setTpdenno(?int $tpdenno);
}