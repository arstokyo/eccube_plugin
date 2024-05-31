<?php

namespace Plugin\AceClient\Util\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime\AceDateTime;
use Plugin\AceClient\Exception\DataTypeMissMatchException;

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
    public function normalize($object, string $format = null, array $context = [])
    {
        if (!$object instanceof AceDateTime) {
            throw new DataTypeMissMatchException('AceDateTime normalize Error: Expected AceDateTime object');
        }
        return $object->toApiDateTime();
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof AceDateTime;
    }
}