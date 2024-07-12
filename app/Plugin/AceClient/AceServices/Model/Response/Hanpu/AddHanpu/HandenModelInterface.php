<?php

namespace Plugin\AceClient43\AceServices\Model\Response\Hanpu\AddHanpu;

use Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;
use Plugin\AceClient43\AceServices\Model\Dependency\Cost;
use Plugin\AceClient43\AceServices\Model\Dependency\Day;

/**
 * Interface for HandenModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelInterface extends Handen\HandenModelGroup1Interface,
                                       Handen\HandenModelGroup2Interface,
                                       Handen\HasThreeDbikouhInterface,
                                       Handen\HasThreeDfmemohInterface,
                                       NoCategory\HasIdInterface,
                                       NoCategory\HasSessIdInterface,
                                       Card\CardModelLevel3Interface,
                                       Card\GMO\GMOModelGroup1Interface,
                                       Cost\HasTotalInterface,
                                       Day\HasSdateInterface
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
}