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
use Symfony\Component\PropertyInfo\PropertyReadInfoExtractorInterface;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\PropertyInfo\Type as LegacyType;
use Symfony\Component\TypeInfo\Type;
use Symfony\Component\TypeInfo\TypeIdentifier;

/**
 * モデル型抽出器（ReflectionExtractor 非継承版）
 * -----------------------------------------------------------------------------
 * - ReflectionExtractor をサービスとして注入し、将来の final 化に備えます。
 * - 取得した object 型のクラス名を ModelResolver で実装クラスに解決して置換します。
 */
class ModelTypeExtractor implements PropertyTypeExtractorInterface
{
    /**
     * @var ModelResolver
     */
    private ModelResolver $modelResolver;

    /**
     * @var PropertyReadInfoExtractorInterface
     */
    private PropertyReadInfoExtractorInterface $reflectionExtractor;

    public function __construct(ModelResolver $modelResolver, PropertyReadInfoExtractorInterface $reflectionExtractor)
    {
        $this->modelResolver = $modelResolver;
        $this->reflectionExtractor = $reflectionExtractor;
    }

    /**
     * @param class-string $class
     * @param string $property
     * @param array $context
     *
     * @return LegacyType[]|null
     */
    public function getTypes(string $class, string $property, array $context = []): ?array
    {
        $types = $this->reflectionExtractor->getTypes($class, $property, $context);

        if ($types === null) {
            return null;
        }

        foreach ($types as $index => $type) {
            if (!$type instanceof LegacyType) {
                continue;
            }

            // コレクション型はスキップ（要素型までの解決は行わない）
            if ($type->isCollection()) {
                continue;
            }

            if ($type->getBuiltinType() !== LegacyType::BUILTIN_TYPE_OBJECT) {
                continue;
            }

            $typeClass = $type->getClassName();
            if (!$typeClass) {
                continue;
            }

            if (!class_exists($typeClass) && !interface_exists($typeClass)) {
                continue;
            }

            // レスポンス側の実装モデルへ解決
            $modelClass = $this->modelResolver->findResponseModel($typeClass);
            if ($modelClass) {
                $types[$index] = new LegacyType(
                    LegacyType::BUILTIN_TYPE_OBJECT,
                    $type->isNullable(),
                    $modelClass,
                    false,
                );
            }
        }

        return $types;
    }

    public function getType(string $class, string $property, array $context = []): ?Type
    {
        // まずはデフォルトの TypeInfo ベースで型を取得
        $defaultType = $this->reflectionExtractor->getType($class, $property, $context);

        if ($defaultType === null) {
            return null;
        }

        if (!$defaultType->isIdentifiedBy(TypeIdentifier::OBJECT)) {
            return $defaultType;
        }

        $className = $defaultType->getClassName();

        if ($className) {
            $resolved = $this->modelResolver->findResponseModel($className) ?: $className;
            $newType = Type::object($resolved);
        }

        return $newType ?? $defaultType;
    }
}
