<?php

namespace Plugin\AceClient\Utils\Denormalize;

use Plugin\AceClient\Utils\Serialize\SerializerFactory;
use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;

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
     * @return ConfigModelInterface
     */
    final protected function denormalizeDTO($data, string $type, string $format = null, array $context = []): ConfigModelInterface
    {
        if (!isset($this->serializer)) {
            $this->serializer = SerializerFactory::makeJsonSerializer();
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