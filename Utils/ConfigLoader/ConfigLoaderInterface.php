<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

interface ConfigReaderInterface
{
    public static function read(string $path): mixed;
}