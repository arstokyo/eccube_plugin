<?php

namespace Plugin\AceClient\Utils\Denormalize;

use Plugin\AceClient\Utils\Serialize\SerializerFactory;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;

/**
 * Trait for denormalizing Array Data To Array objects.
 */
trait ADTAODenormalizerTrait
{
    use DTODenormalizerTrait;

    /**
     * @var Serializer $serializer
     */
    private SerializerInterface $serializer;

    /**
     * Denormalizes the given Array Data To Array objects.
     * 
     * @param array $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     */
    public function denormalizeADTAO(array $data,string $type, string $format = null, array $context = []): array
    {
        $result = $data;
        $this->setSerializer($this->asignNewSerializer->serializer);
        foreach ($data as $key => $value) {
            $result[$key] = $this->denormalizeDTO($value, $type, $format, $context);
        }
        return $result;
    }

    /**
     * Asigns a new Serializer.
     * 
     * return ADTAODenormalizerTrait
     */
    private function asignNewSerializer(): self
    {
        if (!isset($this->serializer)) {
            $this->serializer = SerializerFactory::makeJsonSerializer();
        }
        return $this;
    }

}