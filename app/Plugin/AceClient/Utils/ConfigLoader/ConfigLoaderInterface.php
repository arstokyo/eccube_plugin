<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

interface ConfigLoaderInterface
{
    public static function read(string $path): mixed;
}