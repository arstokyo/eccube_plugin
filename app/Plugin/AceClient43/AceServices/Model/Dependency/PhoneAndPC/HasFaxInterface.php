<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

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
     * @return $this
     */
    public function setFax(?string $fax);

}