<?php

namespace Plugin\AceClient\AceServices\Model\Response;

use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;

/**
 * Handle response as list trait
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait HandleResponseAsListTrait
{
    /**
     * Handle response as list
     * 
     * @param array|null $data
     * @param string $targetModelClass
     * 
     * @return array|null
     */
    protected function handleResponseAsList(?array $data, string $targetModelClass): ?array
    {
        if (!empty($data) && \array_key_exists('@diffgr:id', $data) && !\current($data) instanceof $targetModelClass) {
            $data = [$data];
        }
        return $data;
    }

    /**
     * Denormalize response as list
     * 
     * @param mixed $data
     * @param string $targetModelClass
     * @param Serializer $serializer
     * 
     * @return mixed
     */
    protected function denormalizeResponseAsList(mixed $data, string $targetModelClass, SerializerInterface $serializer): mixed
    {
        return $serializer->denormalize($data, $targetModelClass.'[]');
    }
}