<?php

namespace Plugin\AceClient\Utils\Normalize;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;

/**
 * Class Nomalizer for SOAP XML API.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXMLNormalizer implements NormalizerInterface
{
    /**
     * @var NormalizerInterface $normalizer
     */
    private NormalizerInterface $normalizer;
    
    /**
     * Constructor
     * 
     */
    public function __construct() {
        $normalizer = NormalizerFactory::makeAnnotationNormalizers();
    }

    /**
     * {@inheritDoc}
     * 
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
     * 
     */
    public function supportsNormalization($data, ?string $format = null, array $context = [])
    {
        return $data instanceof RequestModelInterface;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getSupportedTypes(?string $format)
    {
        return [
            RequestModelInterface::class => true,
        ];
    }
}