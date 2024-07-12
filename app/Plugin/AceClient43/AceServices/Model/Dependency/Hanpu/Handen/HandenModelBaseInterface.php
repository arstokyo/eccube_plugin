<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\Hanpu\Handen;

use Plugin\AceClient43\AceServices\Model\Dependency\Day;
use Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;
use Plugin\AceClient43\AceServices\Model\Dependency\Payment;
use Plugin\AceClient43\AceServices\Model\Dependency\Baitai;
use Plugin\AceClient43\AceServices\Model\Dependency\Bumon;
use Plugin\AceClient43\AceServices\Model\Dependency\Souko;
use Plugin\AceClient43\AceServices\Model\Dependency\Haiso;
use Plugin\AceClient43\AceServices\Model\Dependency\Free;
use Plugin\AceClient43\AceServices\Model\Dependency\Bikou;


/**
 * Interface for Has HandenModelBase
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HandenModelBaseInterface extends Day\HasDayInterface,
                                           Denpyo\HasTcodeInterface,
                                           Denpyo\HasJcodeInterface,
                                           Payment\HasPcodeInterface,
                                           Baitai\HasBcodeInterface,
                                           Baitai\HasBkCodeInterface,
                                           Bumon\HasBumonInterface,
                                           Souko\HasSoukoInterface,
                                           Haiso\HasHcodeInterface,
                                           Haiso\HasHtimeInterface,
                                           Free\HasThreeFcodeInterface,
                                           Bikou\HasTwoNBikouInterface,
                                           Bikou\HasTwoOBikouInterface
{
    /**
    * Get 頒布伝票備考1
    *
    * @return ?string
    */
    public function getHbikou1(): ?string;

    /**
     * Set 頒布伝票備考1
     *
     * @param ?string $hbikou1
     * @return $this
     */
    public function setHbikou1(?string $hbikou1);

    /**
    * Get 頒布伝票備考2
    *
    * @return ?string
    */
    public function getHbikou2(): ?string;

    /**
     * Set 頒布伝票備考2
     *
     * @param ?string $hbikou2
     * @return $this
     */
    public function setHbikou2(?string $hbikou2);
}