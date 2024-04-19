<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Config\Model\SoapXmlSerializerModel;
use Plugin\AceClient\Utils\Mapper\ConfigNodeRootNameMapper;

trait SoapXmlSerializerConfigLoaderTrait
{
    use BaseConfigLoaderTrait;

    /**
     * Returns The Configuration Node Name.
     * 
     * @return string
     */
    protected function getConfigRootNodeName(): string
    {
        return ConfigNodeRootNameMapper::SOAP_XML_SERIALIZER;
    }

    /**
     * Returns The Configuration Model Class.
     * 
     * @return string
     */
    protected function getConfigModelClassName(): string
    {
        return SoapXmlSerializerModel::class;
    }
}