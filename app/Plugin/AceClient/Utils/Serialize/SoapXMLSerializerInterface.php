<?php

namespace Plugin\AceClient\Utils\Serialize;

use Symfony\Component\Serializer\SerializerInterface;
use Plugin\AceClient\Config\Model\SoapXmlSerializer\SoapXmlSerializerModel;

/**
 * Interface for Soap Serializer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface SoapXMLSerializerInterface extends SerializerInterface
{
    /**
     * Get the config of the Soap Serializer.
     * 
     * @return SoapXmlSerializerModel
     */
    public function getConfig(): SoapXmlSerializerModel;
}