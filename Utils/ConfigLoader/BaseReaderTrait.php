<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Symfony\Component\Yaml\Yaml;

trait BaseReaderTrait
{
    abstract protected function getConfigPath(): string;

    public function readConfig(string $address)
    {
        
    }
}