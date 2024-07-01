<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Payment;

/**
 * Interface for Has 支払予定方法
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPnameInterface
{
    /**
    * Get 支払予定方法
    *
    * @return ?string
    */
    public function getPname(): ?string;

    /**
     * Set 支払予定方法
     *
     * @param ?string $pname
     * @return $this
     */
    public function setPname(?string $pname);
}