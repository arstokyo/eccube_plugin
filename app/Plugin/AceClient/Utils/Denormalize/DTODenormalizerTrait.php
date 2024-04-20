<?php

namespace Plugin\AceClient\Utils\Denormalize;

use Plugin\AceClient\Utils\Serialize\SerializerFactory;
use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

trait DTODenormalizerTrait
{
    /**
     * @var Serializer $serializer
     */
    private SerializerInterface $serializer;
    
    /**
     * Deserializes data into the given type.
     * 
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     * 
     * @return ConfigModelInterface|ConfigModelInterface[]
     */
    final protected function denormalizeDTO($data, string $type, string $format = null, array $context = []): ConfigModelInterface|array
    {
        if (!isset($this->serializer)) {
            $this->serializer = SerializerFactory::makeDTOSerializer();
        }
        if (!isset($context[AbstractObjectNormalizer::SKIP_NULL_VALUES])) {
            $context[AbstractObjectNormalizer::SKIP_NULL_VALUES] = true;
        }
        return $this->serializer->denormalize($data, $type, $format, $context);
    }

    /**
     * Sets the Serializer.
     * 
     * @param SerializerInterface $serializer
     */
    final protected function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }

    /**
     * Gets the Serializer.
     * 
     * @return ?SerializerInterface
     */
    final protected function getSerializer(): ?SerializerInterface
    {
        return $this->serializer ?? null;
    }

}