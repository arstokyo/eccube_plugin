<?php

namespace Plugin\AceClient\Config\Model\PrmFormat;

use Plugin\AceClient\Config\Model\ConfigModelInterface;


/**
 * Model for Prm Detail Format
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmDetailFormatModel implements ConfigModelInterface
{
    /**
     * @var ?string $format
     */
    private ?string $format = null;
    /**
     * @var ?array $options
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