<?php

namespace Plugin\AceClient\Util\ConfigBuilder;

/**
 * Interface for Config Builder.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface ConfigBuilderInterface
{
    /**
     * Builds the configuration.
     * 
     * @param mixed|null $options
     * 
     * @return array
     */
    public static function build(mixed $options = null): array;
}