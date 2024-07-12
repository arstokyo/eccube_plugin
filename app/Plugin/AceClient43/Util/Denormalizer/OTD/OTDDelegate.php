<?php

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * Delegate for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class OTDDelegate implements OTDDelegateInterface
{
    /**
     * @var mixed $object
     */
    private object $object;

    /**
     * @var ?array $denormalizeOptions
     */
    private ?array $denormalizeOptions = null;

    /**
     * @var ?SerializerInterface $serializer
     */
    private ?SerializerInterface $serializer = null;

    /**
     * Constructor.
     * 
     * @param object $object
     * @param array $denormalizeOptions
     */
    public function __construct(object $object, array $denormalizeOptions = [])
    {
        $this->object = $object;
        $this->denormalizeOptions = $denormalizeOptions;
    }

    /**
     * Get the value of object
     * 
     * @return mixed
     */
    public function getObject(): object
    {
        return $this->object;
    }

    /**
     * Get the value of denormalizeOptions
     * 
     * @return ?array
     */
    public function getDenomarlizeOptions(): ?array
    {
        return $this->denormalizeOptions;
    }

    /**
     * {@inheritDoc}
     */
    public function getSerializer(): ?SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * {@inheritDoc}
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }
}