<?php

namespace Plugin\AceClient\Utils\Denormalize;

use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Factory for Denormalizer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class DenormalizerFactory
{

    /**
     * Make Denormalizer
     * 
     * @return DenormalizerInterface
     */
    final public static function makeArrayDenormalizer(): DenormalizerInterface
    {
        return new ArrayDenormalizer();
    }

}