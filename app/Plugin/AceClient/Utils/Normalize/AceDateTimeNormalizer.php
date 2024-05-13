<?php

namespace Plugin\AceClient\Utils\Normalize;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\AceServices\Model\CustomDataType\AceDateTime\AceDateTime;

class AceDateTimeNormalizer implements NormalizerInterface
{
    public function normalize($object, string $format = null, array $context = [])
    {
        /** @var AceDateTime $object */
        return $object->toApiDateTime();
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof AceDateTime;
    }
}