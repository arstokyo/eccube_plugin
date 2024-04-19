<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Plugin\AceClient\Utils\Mapper\ConfigFileMapper;

trait AcerServiceReaderTrait
{
    use BaseReaderTrait;

    protected function getConfigPath(): string
    {
        return ConfigFileMapper::ACE_SERVICE;
    }

}