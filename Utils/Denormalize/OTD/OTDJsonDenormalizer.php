<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;


class OTDJsonDenormalizer extends OTDDenormalizerAbstract
{

    /**
     * Denormalize OTD
     * 
     * @param OTDDelegateInterface $delegate
     * @return string|null|object
     */
    public function denormalizeOTD(OTDDelegateInterface $delegate): string|null|object
    {
        // TODO: Implement denormalizeOTD() method.
        return $delegate->getObject();
    }
}