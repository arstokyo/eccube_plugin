<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person\Nmember;

/**
 * Interface for 納品先顧客コード
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasNcodeInterface
{
    /**
     * Get 納品先顧客コード
     *
     * @return ?string
     */
    public function getNcode(): ?string;

    /**
     * Set 納品先顧客コード
     *
     * @param string|null $ncode
     * @return $this
     */
    public function setNcode(?string $ncode);
}