<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Utils\Mapper\ConfigPathMapper;

trait SerializerReaderTrait
{
    use BaseReaderTrait;


    protected function getConfigPath(): string
    {
        return ConfigPathMapper::SERIALIZE_PATH;
    }

}