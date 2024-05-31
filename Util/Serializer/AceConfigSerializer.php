<?php

namespace Plugin\AceClient\Util\Serializer;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Serializer for AceConfig
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceConfigSerializer implements SerializerInterface
{
    /**
     * @var Serializer $serializer
     */
    private SerializerInterface $serializer;

    /**
     * AceConfigSerializer Constructor.
     */
    public function __construct()
    {
        $this->serializer = SerializerFactory::makeDTOSerializer();
    }

    /**
     * {@inheritdoc}
     */
    public function deserialize($data, string $type, string $format, array $context = [])
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($data, string $format, array $context = [])
    {
        return $this->serializer->serialize($data, $format, $context);
    }

    /**
     * Denormalize data into an object of the given class.
     * 
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array[] $context
     */
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        return $this->serializer->denormalize($data, $type, $format, $context);
    }

    /**
     * Normalize data in the appropriate format.
     * 
     * @param mixed $data
     * @param string|null $format
     * @param array[] $context
     */
    public function normalize($data, string $format = null, array $context = [])
    {
        return $this->serializer->normalize($data, $format, $context);
    }
}


