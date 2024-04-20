<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

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