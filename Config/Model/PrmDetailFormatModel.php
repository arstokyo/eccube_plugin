<?php

namespace Plugin\AceClient\Config\Model;

class PrmDetailFormatModel implements ConfigModelInterface
{
    /**
     * @var string $format
     */
    private string $format;
    /**
     * @var array $options
     */
    private array $options;

    /**
     * Get the value of format
     * 
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * Set the value of format
     *
     * @return  void
     */
    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    /**
     * Get the value of options
     * 
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @return void
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }
}