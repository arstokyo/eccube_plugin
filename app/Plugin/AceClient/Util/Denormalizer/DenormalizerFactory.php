<?php

namespace Plugin\AceClient\Util\Denormalizer;

use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Plugin\AceClient\Util\Denormalizer\AsListDenormalizer;

/**
 * Factory for Denormalizer.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
final class DenormalizerFactory
{

    /**
     * Make ArrayDenormalizer
     *
     * @return DenormalizerInterface
     */
    public static function makeArrayDenormalizer(): DenormalizerInterface
    {
        return new ArrayDenormalizer();
    }

    /**
     * Make AsListDenormalizer
     *
     * @return DenormalizerInterface
     */
    public static function makeAsListDenormalizer(): DenormalizerInterface
    {
        return new AsListDenormalizer();
    }

}