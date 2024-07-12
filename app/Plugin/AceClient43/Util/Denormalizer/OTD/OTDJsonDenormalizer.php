<?php

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

/**
 * Object To Data Denormalizer for JSON.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDJsonDenormalizer extends OTDDenormalizerAbstract
{

    /**
     * {@inheritDoc}
     */
    public function denormalizeOTD()
    {
        // TODO: Implement denormalizeOTD() method.
        return $this->delegate->getObject();
    }
}