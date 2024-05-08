<?php

namespace Plugin\AceClient\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has Fax
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasFaxInterface
{

    /**
     * Get Fax
     * 
     * @return string|null
     */
    public function getFax(): ?string;

    /**
     * Set Fax
     * 
     * @param string|null $fax
     */
    public function setFax(?string $fax);

}