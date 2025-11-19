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

namespace Plugin\AceClient43\Util\Normalizer;

use Plugin\AceClient43\AceServices\Model\CustomDataType\AceDateTime\AceDateTime;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Normalizer for AceDateTime
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceDateTimeNormalizer implements NormalizerInterface
{
    /**
     * Normalize AceDateTime object
     *
     * @param AceDateTime $object
     * @param string $format
     * @param array $context
     *
     * @return string
     */
    public function normalize($object, ?string $format = null, array $context = [])
    {
        if (!$object instanceof AceDateTime) {
            throw new DataTypeMissMatchException('AceDateTime normalize Error: Expected AceDateTime object');
        }

        return $object->toApiDateTime();
    }

    public function supportsNormalization($data, ?string $format = null)
    {
        return $data instanceof AceDateTime;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            AceDateTime::class => true,
        ];
    }
}
