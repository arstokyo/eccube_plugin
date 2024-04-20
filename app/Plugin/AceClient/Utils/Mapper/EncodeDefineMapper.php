<?php

namespace Plugin\AceClient\Utils\Mapper;

use Symfony\Component\Serializer\Encoder\XmlEncoder;

class EncodeDefineMapper
{
    const XML = 'xml'; 
    const JSON = 'json';

    const XML_ROOT_NODE_NAME = XmlEncoder::ROOT_NODE_NAME;
} 
