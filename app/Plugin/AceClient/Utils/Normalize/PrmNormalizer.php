<?php

namespace Plugin\AceClient\Utils\Normalize;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Plugin\AceClient\AceServices\Model\Request\Prm\PrmModelInterface;

/**
 * Normalizer for Prm
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmNormalizer implements NormalizerInterface
{
    /**
     * Normalize Prm object
     * 
     * @param PrmModelInterface $object
     * @param string $format
     * @param array $context
     * 
     * @return string
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return $object->toData();
    }

    public function supportsNormalization($data, string $format = null)
    {
        return $data instanceof PrmModelInterface;
    }
}