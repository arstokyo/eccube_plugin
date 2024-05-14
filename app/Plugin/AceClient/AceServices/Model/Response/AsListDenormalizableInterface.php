<?php

namespace Plugin\AceClient\AceServices\Model\Response;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;

/**
 * Interface for Denormalize As ListAble
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AsListDenormalizableInterface
{
    /**
     * fetch response as list property
     * 
     * @return array<><>
     */
    public static function fetchAsListProperty(): array;
}