<?php

namespace Plugin\AceClient43\Util\Serializer;

use Symfony\Component\Serializer\SerializerInterface;
use Plugin\AceClient43\AceConfig\Model\SoapXmlSerializer\SoapXmlSerializerModel;

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