<?php

namespace Plugin\AceClient\AceServices\Model\Response\Member\DeleteSbpsCustId;

use Plugin\AceClient\AceServices\Model\Dependency\Day;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient\AceServices\Model\Dependency\Card;

/**
 * Interface for SbpscustidModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface SbpscustidModelInterface extends Day\HasDayInterface,
                                           NoCategory\HasMbidInterface,
                                           Card\HasCedaInterface,
                                           NoCategory\HasCustidInterface
{
    /**
     * Get SBPS顧客枝番
     */
    public function getCeda(): ?string;

    /**
     * Set SBPS顧客枝番
     */
    public function setCeda(?string $ceda);
}