<?php

namespace Plugin\AceClient\Util\Normalizer;

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\Type;

/**
 * Class for Soap Reflection Extractor
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapReflectionExtractor extends ReflectionExtractor
{
    const MAP_TYPES = [
        'integer' => Type::BUILTIN_TYPE_INT,
        'boolean' => Type::BUILTIN_TYPE_BOOL,
        'double' => Type::BUILTIN_TYPE_FLOAT,
    ];

    /**
     * {@inheritDoc}
     */
    public function getTypes(string $class, string $property, array $context = []): array|null
    {
        $types = parent::getTypes($class, $property, $context);
        if ($types !== null) {
            foreach($types as $key => $type) {
                if (strcasecmp($type->getClassName(), \Datetime::class ) === 0){
                    return $this->pushElementToLast($types, $key);
                }
            }
        }
        return $types;
    }

    /**
     * Push the type to the last of the array
     * 
     * @param array $array
     * @param mixed $value
     * @return array
     */
    private function pushElementToLast(array $array, $value): array
    {
        $save = $array[$value];
        unset($array[$value]);
        $array[] = $save;
        return $array;
    }
}