<?php

namespace Plugin\AceClient\Utils\Denormalize;

use Plugin\AceClient\Utils\Serialize\SerializerFactory;
use Plugin\AceClient\Config\Model\ConfigModelInterface;

trait DTODenormalizerTrait
{
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
    protected function denormalizeDTO($data, string $type, string $format = null, array $context = []): ConfigModelInterface
    {
        return SerializerFactory::makeJsonSerializer()->deserialize($data, $type, $format, $context);
    }
}