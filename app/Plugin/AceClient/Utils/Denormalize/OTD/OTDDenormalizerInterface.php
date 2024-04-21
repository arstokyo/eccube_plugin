<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

/**
 * Interface for Object To Data Denormalizer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OTDDenormalizerInterface
{
    /**
     * Denormalizes the given data into the current object.
     * 
     * @param OTDDelegateInterface $delegate
     * @return string|null|object
     */
    public function denormalizeOTD(OTDDelegateInterface $delegate): string|null|object;
}