<?php

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

use Plugin\AceClient43\Exception\NotSerializableException;
use Plugin\AceClient43\Util\Mapper\EncodeDefineMapper;

/**
 * Denormalizer for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class OTDXmlDenormalizer extends OTDDenormalizerAbstract
{

    /**
      * {@inheritDoc}
     */
    public function denormalizeOTD()
    {
        if (null === $this->delegate->getSerializer()) {
            throw new \RuntimeException('OTDXmlDenormalizer Error: Serializer is not set in delegate.');
        }

        try {
            $context = $this->delegate->getSerializer()->serialize($this->getDelegate()->getObject(), 
                                                                   EncodeDefineMapper::XML, 
                                                                   $this->getDelegate()->getDenomarlizeOptions() ?? []);
        } catch(\Throwable $e) {
            throw new NotSerializableException(sprintf('Could not serialize class "%s" to XML', self::class), $e);
        };
        
        return $context;
    }

}