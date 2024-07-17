<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has SBPS顧客ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasCustidInterface
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
}