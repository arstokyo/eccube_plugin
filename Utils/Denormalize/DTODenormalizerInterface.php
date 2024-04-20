<?php

namespace Plugin\AceClient\Utils\Denormalize;

interface DTODenormalizerInterface
{
    /**
     * Denormalizes the given Object To Data.
     * 
     * @param mixed $data
     * @param string|null $format
     * @param array $context
     */
    public function denormalizeDTO($object, string $format = null, array $context = []): mixed;
}