<?php

namespace Plugin\AceClient\Utils\Serialize;

use Plugin\AceClient\Exception\NotSerializableException;
use Plugin\AceClient\Utils\Serialize\SerializerFactory;
use Plugin\AceClient\Utils\Mapper\EncodeDefineMapper;

/**
 * Trait for XML serialization.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait ToXmlTrait
{
    /**
     * Serialize the object to XML
     * 
     * @return string
     * 
     * @throws NotSerializableException
     */
    public function toXML($object = null) : string {
        $serializer = SerializerFactory::makeXmlSerializer();
        try {
            $context = $serializer->serialize($object ?? $this, EncodeDefineMapper::XML, $this->setXmlSerializeOptions() ?? []);
        } catch(\Throwable $e) {
            throw new NotSerializableException(sprintf('Could not serialize class "%s" to XML', self::class), $e);
        };
        unset($serializer);
        return $context;
    }

    /**
     * Set the options for the XML serialization
     * 
     * @return ?array
     */
    abstract protected function setXmlSerializeOptions(): ?array;

}
