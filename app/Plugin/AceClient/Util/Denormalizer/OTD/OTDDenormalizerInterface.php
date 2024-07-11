<?php

namespace Plugin\AceClient\Util\Denormalizer\OTD;

/**
 * Interface for Object To Data Denormalizer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OTDDenormalizerInterface
{
    /**
     * Denormalizes the given data 
     * 
     * @return string|null|object
     */
    public function denormalizeOTD();

    /**
     * Get Delegate
     * 
     * @return OTDDelegateInterface
     */
    public function getDelegate(): OTDDelegateInterface;
}