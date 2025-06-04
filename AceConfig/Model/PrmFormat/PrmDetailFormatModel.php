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

namespace Plugin\AceClient43\AceConfig\Model\PrmFormat;

use Plugin\AceClient43\AceConfig\Model\ConfigModelInterface;

/**
 * Model for Prm Detail Format
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmDetailFormatModel implements ConfigModelInterface
{
    /**
     * @var ?string
     */
    private ?string $format = null;
    /**
     * @var ?array
     */
    private ?array $options = null;

    /**
     * Get the value of format
     *
     * @return ?string
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * Set the value of format
     *
     * @return void
     */
    public function setFormat(?string $format): void
    {
        $this->format = $format;
    }

    /**
     * Get the value of options
     *
     * @return ?array
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @return void
     */
    public function setOptions(?array $options): void
    {
        $this->options = $options;
    }
}
