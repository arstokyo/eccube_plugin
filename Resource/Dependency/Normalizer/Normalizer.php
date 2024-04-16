<?php

namespace Plugin\AceClient\Dependency;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class Normalizer implements NormalizerInterface
{
    public function __construct(
        // // #[Autowire(service: 'serializer.normalizer.object')]
        // private readonly NormalizerInterface $normalizer,

        // private UrlGeneratorInterface $router,
    ) {
    }

    public function normalize($topic, ?string $format = null, array $context = [])
    {
        // $data = $this->normalizer->normalize($topic, $format, $context);

        // // Here, add, edit, or delete some data:
        // $data['href']['self'] = $this->router->generate('topic_show', [
        //     'id' => $topic->getId(),
        // ], UrlGeneratorInterface::ABSOLUTE_URL);

        // return $data;
    }

    public function supportsNormalization($data, ?string $format = null, array $context = [])
    {
        // return $data instanceof Topic;
    }

    public function getSupportedTypes(?string $format)
    {
        // return [
        //     Topic::class => true,
        // ];
    }
}