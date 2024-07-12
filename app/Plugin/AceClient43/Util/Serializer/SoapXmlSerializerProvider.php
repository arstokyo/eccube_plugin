<?php

namespace Plugin\AceClient43\Util\Serializer;

use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient43\Util\Encoder\EncoderFactory;
use Plugin\AceClient43\Util\Normalizer\NormalizerFactory;

/**
 * Provider for SoapSerializer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlSerializerProvider
{
    /** @var SoapXmlSerializer $SoapXmlSerializer */
    private SoapXmlSerializer $SoapXmlSerializer;

    /** @var EncoderInterface[] $encoders */
    private array $encoders;

    /** @var NormalizerInterface[] $normalizers */
    private array $normalizers;

    /**
     * Constructor.
     * 
     * @param AceConfigSerializer $aceConfigSerializer
     */
    public function __construct(AceConfigSerializer $aceConfigSerializer)
    {
        $this->encoders = [EncoderFactory::makeEncoderByClassName(EncoderFactory::DEFAULT_ENCODER_FOR_SOAP_SERIALIZER)];
        $this->normalizers = NormalizerFactory::makeNormalizerByFuncNameSuffix(NormalizerFactory::DEFAULT_NORMALIZERS_FOR_SOAP_SERIALIZER);
        $this->SoapXmlSerializer = new SoapXmlSerializer($this->normalizers, $this->encoders,  $aceConfigSerializer);
    }

    /**
     * Get the encoders.
     * 
     * @return EncoderInterface[]
     */
    public function getEncoders(): array
    {
        return $this->encoders;
    }

    /**
     * Get the Normalizers.
     * 
     * @return NormalizerInterface[]
     */
    public function getNormalizers(): array
    {
        return $this->normalizers;
    }

    /**
     * Get the SoapXmlSerializer.
     * 
     * @return SoapXmlSerializer
     */
    public function getSoapXmlSerializer(): SoapXmlSerializer
    {
        return $this->SoapXmlSerializer;
    }

}