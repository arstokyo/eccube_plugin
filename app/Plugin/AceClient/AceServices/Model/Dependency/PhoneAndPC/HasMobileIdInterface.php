<?php

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface for Has 携帯固有ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMobileIdInterface
{
    /**
     * Get 携帯固有ID
     *
     * @return ?string
     */
    public function getMobileId(): ?string;

    /**
     * Set 携帯固有ID
     *
     * @param ?string $mobileId
     * @return $this
     */
    public function setMobileId(?string $mobileId);
}