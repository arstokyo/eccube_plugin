<?php

namespace Plugin\AceClient\Utils\Denormalize;


class OTDXmlDenormalizer extends OTDDenormalizerAbstract
{

    public function denormalizeOTD(OTDDelegateInterface $delegate): mixed
    {
        // Get the object and options from the delegate
        $object = $delegate->getObject();
        $options = $delegate->getDenomarlizeOptions();

        // Get the XML data from the object
        $xml = $object->getXml();

        // Create a new SimpleXMLElement object from the XML data
        $xmlElement = new \SimpleXMLElement($xml);

        // Denormalize the XML data into the object
        $this->denormalizeXmlElement($xmlElement, $object, $options);

        return $object;
    }
    // Add your code here
}