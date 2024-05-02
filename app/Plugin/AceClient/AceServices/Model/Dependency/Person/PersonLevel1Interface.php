<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\Person;

/**
 * Interface For Person Level 1
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PersonLevel1Interface 
{
    /**
     * Get 顧客コード
     * 
     * @return string
     */
    public function getCode(): ?string;

    /**
     * Set 顧客コード
     * 
     * @param string $code
     */
    public function setCode(?string $code);
}

