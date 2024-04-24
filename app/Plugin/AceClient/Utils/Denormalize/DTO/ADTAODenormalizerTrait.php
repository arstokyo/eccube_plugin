<?php

namespace Plugin\AceClient\Utils\Denormalize\DTO;

use Plugin\AceClient\Utils\Serialize\SerializerFactory;

/**
 * Trait for denormalizing Array Data To Array objects.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait ADTAODenormalizerTrait
{
    use DTODenormalizerTrait;

    /**
     * Denormalizes the given Array Data To Array objects.
     * 
     * @param array $data
     * @param string $type
     * @param string|null $format
     * @param array $context
     */
    final public function denormalizeADTAO(array $data,string $type, string $format = null, array $context = []): array
    {
        $result = $data;
        if (!$this->getSerializerForDTO()) {
            $this->setSerializerForDTO(SerializerFactory::makeDTOSerializer());
        };
        foreach ($result as $key => $value) {
            if (is_array($value)) {
                foreach($value as $k => $v) {
                    $result[$key][$k] = $this->denormalizeDTO($v, $type, $format, $context);
                }
            }
        }
        return $result;
    }

}