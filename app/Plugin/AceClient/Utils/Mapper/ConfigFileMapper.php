<?php

namespace Plugin\AceClient\Utils\Mapper;

class ConfigFileMapper
{
    const ROOT_CONFIG_PATH = __DIR__.'/../../Resource/Config';
    const SERIALIZE_PATH = self::ROOT_CONFIG_PATH.'Serializer.yaml' ;

    const SOAP_HTTP_CLIENT = self::ROOT_CONFIG_PATH.'SoapHttpClient.yaml';

    const ACE_SERVICE = self::ROOT_CONFIG_PATH.'AceService.yaml';

    const SOAP_SERIALIZER_FILE_NAME = 'SoapSerializer.yaml';
}