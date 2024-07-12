<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Member\UpdateSbpsCustId;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;
use Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Interface UpdateSbpsCustIdRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdateSbpsCustIdRequestModelInterface extends RequestModelInterface,
                                                        NoCategory\HasSyidInterface,
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