<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Payment;

/**
 * Interface for Has 支払予定方法コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPcodeInterface
{
    /**
    * Get 支払予定方法コード
    *
    * @return ?int
    */
    public function getPcode(): ?int;

    /**
     * Set 支払予定方法コード
     *
     * @param ?int $pcode
     * @return $this
     */
    public function setPcode(?int $pcode);
}