<?php

namespace Plugin\AceClient\Util\Mapper;

/**
 * Mapper for Config Node Root Name.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ConfigNodeRootNameMapper
{
    const SOAP_XML_SERIALIZER = 'soap_xml_serializer';
    const PRM_OTD_FORMAT = 'prm_otd_format';
    const ACE_METHOD = 'ace_method';
    const BASE_URI_PATH = self::ACE_METHOD . '.default.http_client.base_uri';
}