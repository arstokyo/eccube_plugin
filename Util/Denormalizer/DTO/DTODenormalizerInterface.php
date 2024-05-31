<?php

namespace Plugin\AceClient\Util\Denormalizer\DTO;

/**
 * Interface for denormalizing DataToObject.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
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