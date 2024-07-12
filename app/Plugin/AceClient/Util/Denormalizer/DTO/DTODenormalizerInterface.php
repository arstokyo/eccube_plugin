<?php

namespace Plugin\AceClient43\Util\Denormalizer\DTO;

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
     * @return mixed
     */
    public function denormalizeDTO($object, string $format = null, array $context = []);
}