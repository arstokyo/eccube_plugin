<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\DeleteSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface DeleteSbpsCustIdRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface DeleteSbpsCustIdRequestModelInterface extends RequestModelInterface,
                                                        NoCategory\HasSyidInterface,
                                                        NoCategory\HasMbidInterface
{
    /**
     * Get SBPS顧客枝番
     *
     * @return ?string
     */
    public function getCeda(): ?string;

    /**
     * Set SBPS顧客枝番
     *
     * @param ?string $ceda
     * @return $this
     */
    public function setCeda(?string $ceda);
}