<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Utils\Mapper\ConfigFileMapper;

trait SerializerReaderTrait
{
    use BaseReaderTrait;


    protected function getConfigPath(): string
    {
        return ConfigFileMapper::SERIALIZE_PATH;
    }

}