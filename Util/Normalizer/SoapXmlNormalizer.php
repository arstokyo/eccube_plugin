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

namespace Plugin\AceClient43\Util\Normalizer;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Class Nomalizer for SOAP XML API.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlNormalizer implements NormalizerInterface
{
    /**
     * @var NormalizerInterface
     */
    private NormalizerInterface $normalizer;

    /**
     * Constructor
     */
    public function __construct()
    {
        // このクラスはまだ使っていないので、今後　編集する予定です。Thong
        $normalizer = NormalizerFactory::makeAnnotationNormalizers();
    }

    /**
     * {@inheritDoc}
     */
    public function normalize($topic, ?string $format = null, array $context = [])
    {
        $data = $this->normalizer->normalize($topic, $format, $context);

        // // Here, add, edit, or delete some data:
        // $data['href']['self'] = $this->router->generate('topic_show', [
        //     'id' => $topic->getId(),
        // ], UrlGeneratorInterface::ABSOLUTE_URL);

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function supportsNormalization($data, ?string $format = null, array $context = [])
    {
        return $data instanceof RequestModelInterface;
    }

    /**
     * {@inheritDoc}
     */
    public function getSupportedTypes(?string $format)
    {
        return [
            RequestModelInterface::class => false,
        ];
    }
}
