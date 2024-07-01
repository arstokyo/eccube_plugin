<?php

namespace Plugin\AceClient\Util\Denormalizer\OTD;

/**
 * Null Denormalizer for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDNullDenormalizer extends OTDDenormalizerAbstract
{
    /**
     * {@inheritDoc}
     */
    public function denormalizeOTD()
    {
        return null;
    }
}