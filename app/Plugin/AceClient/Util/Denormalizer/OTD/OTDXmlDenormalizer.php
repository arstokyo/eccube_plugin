<?php

namespace Plugin\AceClient\Util\Denormalizer\OTD;

use Plugin\AceClient\Exception\NotSerializableException;
use Plugin\AceClient\Util\Mapper\EncodeDefineMapper;

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
    public function denormalizeOTD(): string|null|object
    {
        if ($this->delegate->getSerializer() === null) {
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