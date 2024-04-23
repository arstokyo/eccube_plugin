<?php

namespace Plugin\AceClient\Config\Model\AceMethod;

use Plugin\AceClient\Config\Model\ConfigModelInterface;


class SerializerConfigModel extends InstanceConfigAbstract implements ConfigModelInterface
{
    /**
     * @var ?string $encoder
     */
    private ?string $encoder = null;

    /**
     * Get encode.
     * 
     * @return ?string
     */
    public function getEncoder(): ?string
    {
        return $this->encoder;
    }

    /**
     * Set encode.
     * 
     * @param ?string $encoder
     */
    public function setEncoder(?string $encoder): void
    {
        $this->encoder = $encoder;
    }
}