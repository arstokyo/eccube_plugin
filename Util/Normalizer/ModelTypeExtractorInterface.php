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

use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\PropertyInfo\Type as LegacyType;
use Symfony\Component\TypeInfo\Type;

/**
 * モデル型抽出器（ReflectionExtractor 非継承版）
 * -----------------------------------------------------------------------------
 * - ReflectionExtractor をサービスとして注入し、将来の final 化に備えます。
 * - 取得した object 型のクラス名を ModelResolver で実装クラスに解決して置換します。
 */
interface ModelTypeExtractorInterface extends PropertyTypeExtractorInterface
{
    /**
     * @param class-string $class
     * @param string $property
     * @param array $context
     *
     * @return LegacyType[]|null
     */
    public function getTypes(string $class, string $property, array $context = []): ?array;

    public function getType(string $class, string $property, array $context = []): ?Type;
}
