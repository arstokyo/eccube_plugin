<?php

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

/**
 * Object Denormalizer for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDObjectDenormalizer extends OTDDenormalizerAbstract
{
    /**
     * {@inheritDoc}
     */
    public function denormalizeOTD()
    {
        return $this->delegate->getObject();
    }
}