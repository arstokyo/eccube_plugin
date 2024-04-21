<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

/**
 * Object To Data Denormalizer for JSON.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
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