<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

class OTDNullDenormalizer extends OTDDenormalizerAbstract
{
    /**
     * Denormalize OTD
     * 
     * @param OTDDelegateInterface $delegate
     * @return string|null|object
     */
    public function denormalizeOTD(OTDDelegateInterface $delegate): string|null|object
    {
        return null;
    }
}