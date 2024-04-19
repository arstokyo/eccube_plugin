<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Utils\Mapper\ConfigFileMapper;

trait SoapHttpClientReaderTrait
{

    protected function getConfigPath(): string
    {
        return ConfigFileMapper::SOAP_HTTP_CLIENT;
    }

}