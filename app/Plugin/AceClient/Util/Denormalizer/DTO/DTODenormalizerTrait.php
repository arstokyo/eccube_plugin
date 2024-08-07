<?php

namespace Plugin\AceClient\Util\Denormalizer\DTO;

use Plugin\AceClient\Util\Serializer\SerializerFactory;
use Plugin\AceClient\AceConfig\Model\ConfigModelInterface;
use Plugin\AceClient\AceConfig\Model\OverridableConfigInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;

/**
 * Trait for denormalizing Data to Object.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait DTODenormalizerTrait
{
    /**
     * @var Serializer $dtoSerializer
     */
    private SerializerInterface $dtoSerializer;
    
    /**
     * Deserializes data into the given type.
     * 
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     * 
     * @return ConfigModelInterface|OverridableConfigInterface
     */
    final protected function denormalizeDTO($data, string $type, string $format = null, array $context = [])
    {
        if (!isset($this->dtoSerializer)) {
            $this->dtoSerializer = SerializerFactory::makeDTOSerializer();
        }
        
        return $this->dtoSerializer->denormalize($data, $type, $format, $context);
    }

    /**
     * Sets the Serializer.
     * 
     * @param SerializerInterface $serializer
     */
    final protected function setSerializerForDTO(SerializerInterface $serializer): void
    {
        $this->dtoSerializer = $serializer;
    }

    /**
     * Gets the Serializer.
     * 
     * @return ?SerializerInterface
     */
    final protected function getSerializerForDTO(): ?SerializerInterface
    {
        return $this->dtoSerializer ?? null;
    }

}