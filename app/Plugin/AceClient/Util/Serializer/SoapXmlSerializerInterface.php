<?php

namespace Plugin\AceClient\Util\Serializer;

use Symfony\Component\Serializer\SerializerInterface;
use Plugin\AceClient\AceConfig\Model\SoapXmlSerializer\SoapXmlSerializerModel;

/**
 * Interface for Soap Serializer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface SoapXmlSerializerInterface extends SerializerInterface
{
    /**
     * Get the config of the Soap Serializer.
     * 
     * @return SoapXmlSerializerModel
     */
    public function getConfig(): SoapXmlSerializerModel;

}