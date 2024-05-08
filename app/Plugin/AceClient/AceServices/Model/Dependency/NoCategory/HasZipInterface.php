<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has Zip
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasZipInterface
{

    /**
     * Get 郵便番号
     * 
     * @return string|null
     */
    public function getZip(): ?string;

    /**
     * Set 郵便番号
     * 
     * @param string|null $zip
     */
    public function setZip(?string $zip);
}