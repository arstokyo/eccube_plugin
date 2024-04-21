<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

/**
 * Object Denormalizer for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDObjectDenormalizer extends OTDDenormalizerAbstract
{
    /**
     * Denormalize OTD
     * 
     * @param OTDDelegateInterface $delegate
     * @return string|null|object
     */
    public function denormalizeOTD(OTDDelegateInterface $delegate): string|null|object
    {
        return $delegate->getObject();
    }
}