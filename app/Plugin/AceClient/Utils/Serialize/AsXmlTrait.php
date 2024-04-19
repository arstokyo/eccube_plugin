<?php

namespace Plugin\AceClient\Utils\Serialize;

use Plugin\AceClient\Exception\SerializeException;
use Plugin\AceClient\Utils\Serialize\SerializerFactory;

trait AsXmlTrait
{
    public function asXML() : string {
        $serializer = SerializerFactory::makeXmlSerializer();
        try {
            $context = $serializer->serialize($this,'xml',$this->setXmlSerializeOptions());
        } catch(\Throwable $e) {
            throw new SerializeException(sprintf('Could not serialize class "%s" to XML '."\n".'Detail Error Message: "%s"',self::class ,$e->getMessage()));
        };
        return $context;
    }

    abstract protected function setXmlSerializeOptions(): array;

}
