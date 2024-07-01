<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has Order ID
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasOrderIdInterface
{
    /**
     * Get Order ID
     * 
     * @return string|null
     */
    public function getOrderid(): ?string;

    /**
     * Set Order ID
     * 
     * @param string|null $orderid
     * @return $this
     */
    public function setOrderid(?string $orderid);
}