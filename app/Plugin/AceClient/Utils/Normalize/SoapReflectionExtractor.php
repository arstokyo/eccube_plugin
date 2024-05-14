<?php

namespace Plugin\AceClient\Utils\Normalize;

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

/**
 * Class for Soap Reflection Extractor
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapReflectionExtractor extends ReflectionExtractor
{

    /**
     * {@inheritDoc}
     */
    public function getTypes(string $class, string $property, array $context = []): array|null
    {
        $types = parent::getTypes($class, $property, $context);
        if ($types !== null) {
            foreach($types as $key => $type) {
                if ($type->getClassName() === 'DateTime') {
                    $types = $this->pushToLast($types, $key);
                    break;
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
    private function pushToLast(array $array, $value): array
    {
        $save = $array[$value];
        unset($array[$value]);
        $array[] = $save;
        return $array;
    }
}