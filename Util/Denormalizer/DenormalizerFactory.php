<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\Denormalizer;

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
