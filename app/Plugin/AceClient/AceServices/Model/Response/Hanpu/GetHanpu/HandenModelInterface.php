<?php

namespace Plugin\AceClient\AceServices\Model\Response\Hanpu\GetHanpu;

use Plugin\AceClient\AceServices\Model\Dependency\Hanpu\Handen;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Card;
use Plugin\AceClient\AceServices\Model\Dependency\Cost;
use Plugin\AceClient\AceServices\Model\Dependency\Day;

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
    public function setSpscustomerid(string|null $spscustomerid): static;

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
    public function setSpstid(string|null $spstid): static;
}