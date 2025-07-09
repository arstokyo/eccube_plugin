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

namespace Plugin\AceClient43\Util\Serializer;

use Plugin\AceClient43\Util\Encoder\EncoderFactory;
use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Plugin\AceClient43\Util\Normalizer\NormalizerFactory;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Provider for SoapSerializer.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlSerializerProvider
{
    /** @var SoapXmlSerializer */
    private SoapXmlSerializer $SoapXmlSerializer;

    /** @var EncoderInterface[] */
    private array $encoders;

    /** @var NormalizerInterface[] */
    private array $normalizers;

    /**
     * Constructor.
     *
     * @param AceConfigSerializer $aceConfigSerializer
     */
    public function __construct(AceConfigSerializer $aceConfigSerializer, ModelResolver $modelResolver)
    {
        $this->encoders = [EncoderFactory::makeEncoderByClassName(EncoderFactory::DEFAULT_ENCODER_FOR_SOAP_SERIALIZER)];
        $this->normalizers = NormalizerFactory::makeNormalizerByFuncNameSuffix(NormalizerFactory::DEFAULT_NORMALIZERS_FOR_SOAP_SERIALIZER, $modelResolver);
        $this->SoapXmlSerializer = new SoapXmlSerializer($this->normalizers, $this->encoders, $aceConfigSerializer);
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
