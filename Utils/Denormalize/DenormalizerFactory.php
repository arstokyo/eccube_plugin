<?php

namespace Plugin\AceClient\Utils\Denormalize;

use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

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