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

use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\Type;

/**
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ModelTypeExtractor extends ReflectionExtractor
{
    public const MAP_TYPES = [
        'integer' => Type::BUILTIN_TYPE_INT,
        'boolean' => Type::BUILTIN_TYPE_BOOL,
        'double' => Type::BUILTIN_TYPE_FLOAT,
    ];

    public function __construct(ModelResolver $modelResolver)
    {
        parent::__construct();
        $this->modelResolver = $modelResolver;
    }

    private ModelResolver $modelResolver;

    public function getTypes(string $class, string $property, array $context = []): ?array
    {
        $types = parent::getTypes($class, $property, $context);

        if ($types !== null) {
            foreach ($types as $key => $type) {
                if ($type->isCollection() || $type->getBuiltinType() !== Type::BUILTIN_TYPE_OBJECT) {
                    continue;
                }

                $typeClass = $type->getClassName();
                if ($typeClass && (class_exists($typeClass) || interface_exists($typeClass))) {
                    $modelClass = $this->modelResolver->findResponseModel($typeClass);
                    if ($modelClass) {
                        $types[$key] = new Type(Type::BUILTIN_TYPE_OBJECT, false, $modelClass);
                    }
                }
            }
        }

        return $types;
    }
}
