<?php

namespace Plugin\AceClient\Util\Denormalizer\OTD;

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
    public function denormalizeOTD(): string|null|object
    {
        // TODO: Implement denormalizeOTD() method.
        return $this->delegate->getObject();
    }
}