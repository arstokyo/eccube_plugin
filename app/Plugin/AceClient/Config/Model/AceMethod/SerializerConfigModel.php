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
     * @var ?string $normalizers
     */
    private ?string $normalizers = null;

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

    /**
     * Get normalizers.
     * 
     * @return ?string
     */
    public function getNormalizers(): ?string
    {
        return $this->normalizers;
    }

    /**
     * Set normalizers.
     * 
     * @param ?string $normalizers
     */
    public function setNormalizers(?string $normalizers): void
    {
        $this->normalizers = $normalizers;
    }

}