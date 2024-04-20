<?php

namespace Plugin\AceClient\Utils\Denormalize;

interface OTDDenormalizerInterface
{
    /**
     * Denormalizes the given data into the current object.
     * 
     * @param OTDDelegateInterface $delegate
     */
    public function denormalizeOTD(OTDDelegateInterface $delegate): mixed;
}