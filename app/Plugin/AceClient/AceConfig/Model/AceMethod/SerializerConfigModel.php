<?php

namespace Plugin\AceClient43\AceConfig\Model\AceMethod;

use Plugin\AceClient43\AceConfig\Model\ConfigModelInterface;
use Plugin\AceClient43\Util\ConfigLoader\ConvertToConstTrait;

/**
 * SerializerConfigModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SerializerConfigModel extends InstanceConfigAbstract implements ConfigModelInterface
{
    use ConvertToConstTrait;

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
        if (\defined($encoder)) {
            $encoder = $this->convertVarToStringConst($encoder);
        }
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
        if (\defined($normalizers)) {
            $normalizers = $this->convertVarToStringConst($normalizers);
        }
        $this->normalizers = $normalizers;
    }

}