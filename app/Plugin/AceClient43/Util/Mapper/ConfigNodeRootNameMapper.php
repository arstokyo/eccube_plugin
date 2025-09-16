<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\Mapper;

/**
 * Mapper for Config Node Root Name.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ConfigNodeRootNameMapper
{
    public const SOAP_XML_SERIALIZER = 'soap_xml_serializer';
    public const PRM_OTD_FORMAT = 'prm_otd_format';
    public const ACE_METHOD = 'ace_method';
    public const BASE_URI_PATH = self::ACE_METHOD.'.default.http_client.base_uri';
}
