<?php

namespace Plugin\AceClient\AceServices\Model\Request\Member\UpdateSbpsCustId;

use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface UpdateSbpsCustIdRequestInterface
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface UpdateSbpsCustIdRequestModelInterface extends RequestModelInterface,
                                                        NoCategory\HasSyidInterface,
                                                        NoCategory\HasMbidInterface
{
    /**
     * Get SBPS顧客ID
     *
     * @return ?string
     */
    public function getCustid(): ?string;

    /**
     * Set SBPS顧客ID
     *
     * @param ?string $custid
     * @return $this
     */
    public function setCustid(?string $custid);

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