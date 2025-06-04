<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\AceConfig\Model;

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
    public function getDefaultConfig(): ConfigModelInterface;

    /**
     * Get the overrides
     *
     * @return ?array
     */
    public function getOverrides(): ?array;

    /**
     * Get the overrided config
     *
     * @return ?ConfigModelInterface
     */
    public function getOverridedConfig(string $key): ?ConfigModelInterface;
}
