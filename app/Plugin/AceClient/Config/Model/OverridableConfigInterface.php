<?php

namespace Plugin\AceClient\Config\Model;

/**
 * Interface for Overridable Config Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OverridableConfigInterface
{
    /**
     * Get the specific override for the config
     *
     * @return ?ConfigModelInterface
     */
    public function getSpecificOverride(string $key): ?ConfigModelInterface;

    /**
     * Get the default config
     *
     * @return ConfigModelInterface
     */
    public function getDefaultConfig() : ConfigModelInterface;

    /**
     * Get the overrides
     *
     * @return ?array
     */
    public function getOverrides() : ?array;

    /**
     * Get the overrided config
     *
     * @return ?ConfigModelInterface
     */
    public function getOverridedConfig(string $key) : ?ConfigModelInterface;

}

