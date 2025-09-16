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

use Symfony\Component\Serializer\Encoder\XmlEncoder;

/**
 * Mapper for Encode Define.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class EncodeDefineMapper
{
    public const XML = 'xml';
    public const JSON = 'json';
    public const XML_ROOT_NODE_NAME = XmlEncoder::ROOT_NODE_NAME;
}
