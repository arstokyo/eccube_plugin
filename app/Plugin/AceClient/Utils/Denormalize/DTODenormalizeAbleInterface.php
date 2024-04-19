<?php

namespace Plugin\AceClient\Utils\Denormalize;

interface DTODenormalizeAbleInterface
{
    /**
     * Denormalizes the given data into the current object.
     * 
     * @param mixed $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     */
    public function denormalizeDTO($data, string $type, string $format = null, array $context = []): void;
}