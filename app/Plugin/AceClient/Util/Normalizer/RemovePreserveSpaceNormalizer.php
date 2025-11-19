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

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\PropertyTypeExtractorInterface;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorResolverInterface;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactoryInterface;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * RemovePreserveSpaceNormalizer
 *
 * 概要:
 * - XMLデコーダが生成する配列から「@xml:space」ラッパーを除去し、値('#')のみを取り出す前処理を行うノーマライザです。
 * - 属性の抽出・取得・設定は、注入されたグローバル ObjectNormalizer に委譲します（当クラス自身はそのラッパー）。
 * - デシリアライズはフォーマットが XML の場合のみ対応します（supportsDenormalization で判定）。
 *
 * 用途:
 * - SOAP XML レスポンスのデシリアライズ時に、最初に本ノーマライザを通すことで @xml:space を安全に除去します。
 * - その後の実際の属性マッピングは ObjectNormalizer が担当します。
 *
 * 注意:
 * - SOAP専用のフラグは保持しません。フォーマット判定（XML のみ）で制御します。
 *
 * @author: v.t.nguyen@ar-system.co.jp
 */
class RemovePreserveSpaceNormalizer extends AbstractObjectNormalizer
{
    /**
     * XML デコーダが付与する空白保持キー名
     */
    public const PRESERVE_SPACE_KEY = '@xml:space';

    public const REMOVE_XML_KEYS = [
        AsListDenormalizer::DIFF_GR_ID,
        '@msdata:rowOrder',
        '@diffgr:hasChanges',
    ];

    /**
     * 内部委譲先のグローバル ObjectNormalizer
     *
     * @var ObjectNormalizer
     */
    private ObjectNormalizer $innerObjectNormalizer;

    /**
     * コンストラクタ
     *
     * @param ObjectNormalizer                         $soapXmlObjectNormalizer 委譲先となるグローバル ObjectNormalizer
     * @param ClassMetadataFactoryInterface|null       $classMetadataFactory    メタデータファクトリ
     * @param NameConverterInterface|null              $nameConverter           名前変換
     * @param PropertyTypeExtractorInterface|null      $propertyTypeExtractor   プロパティ型抽出
     * @param ClassDiscriminatorResolverInterface|null $classDiscriminatorResolver クラス判別子リゾルバ
     * @param callable|null                            $objectClassResolver     クラス解決コールバック
     * @param array                                    $defaultContext          既定のコンテキスト
     */
    public function __construct(
        ObjectNormalizer $soapXmlObjectNormalizer,
        ?ClassMetadataFactoryInterface $classMetadataFactory = null,
        ?NameConverterInterface $nameConverter = null,
        ?PropertyTypeExtractorInterface $propertyTypeExtractor = null,
        ?ClassDiscriminatorResolverInterface $classDiscriminatorResolver = null,
        ?callable $objectClassResolver = null,
        array $defaultContext = [],
    ) {
        if (!class_exists(PropertyAccess::class)) {
            throw new LogicException('ObjectNormalizer を利用するには "symfony/property-access" コンポーネントが必要です。 "composer require symfony/property-access" を実行してください。');
        }

        parent::__construct(
            $classMetadataFactory,
            $nameConverter,
            $propertyTypeExtractor,
            $classDiscriminatorResolver,
            $objectClassResolver,
            $defaultContext
        );

        $this->innerObjectNormalizer = $soapXmlObjectNormalizer;
    }

    /**
     * 属性名の一覧を抽出する
     *
     * @param object      $object  対象オブジェクト
     * @param string|null $format  フォーマット
     * @param array       $context コンテキスト
     *
     * @return array 属性名の配列
     */
    protected function extractAttributes(object $object, ?string $format = null, array $context = []): array
    {
        return $this->innerObjectNormalizer->extractAttributes($object, $format, $context);
    }

    /**
     * 属性値を取得する
     *
     * @param object      $object    対象オブジェクト
     * @param string      $attribute 属性名
     * @param string|null $format    フォーマット
     * @param array       $context   コンテキスト
     *
     * @return mixed 取得した属性値
     */
    protected function getAttributeValue(object $object, string $attribute, ?string $format = null, array $context = []): mixed
    {
        return $this->innerObjectNormalizer->getAttributeValue($object, $attribute, $format, $context);
    }

    /**
     * 属性値を設定する
     *
     * @param object      $object    対象オブジェクト
     * @param string      $attribute 属性名
     * @param mixed       $value     設定値
     * @param string|null $format    フォーマット
     * @param array       $context   コンテキスト
     *
     * @return void
     */
    protected function setAttributeValue(object $object, string $attribute, mixed $value, ?string $format = null, array $context = []): void
    {
        $this->innerObjectNormalizer->setAttributeValue($object, $attribute, $value, $format, $context);
    }

    /**
     * デシリアライズ前処理
     *
     * - XMLデコーダが出力する配列から「@xml:space」を検出し、値('#')へ置き換える。
     * - 配列以外／空配列はそのまま返す。
     *
     * @param mixed $data 入力データ
     *
     * @return array 修正済み配列（配列以外はそのまま返す）
     */
    protected function prepareForDenormalization(mixed $data): array
    {
        if (!is_array($data) || \count($data) === 0) {
            return $data;
        }

        foreach ($data as $key => $value) {
            if (\in_array($key, self::REMOVE_XML_KEYS, true) || $value === '') {
                unset($data[$key]);
                continue;
            }

            if (!is_array($value) || \count($value) !== 2 || !isset($value[self::PRESERVE_SPACE_KEY])) {
                continue;
            }

            $data[$key] = $value['#'] ?? null;
        }

        return $data;
    }

    /**
     * 正規化（オブジェクト→配列/スカラー）に対応するか
     *
     * 本ノーマライザは正規化を担当しないため常に false を返す。
     *
     * @param mixed       $data   対象データ
     * @param string|null $format フォーマット
     *
     * @return false
     */
    public function supportsNormalization(mixed $data, ?string $format = null)
    {
        return false;
    }

    /**
     * デシリアライズ（配列→オブジェクト）に対応するか
     *
     * 条件:
     * - フォーマットが XML の場合のみ true。
     * - 入力データは空でない配列であること。
     *
     * @param mixed       $data   入力データ
     * @param string      $type   ターゲット型
     * @param string|null $format フォーマット
     *
     * @return bool 対応可否
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null): bool
    {
        if ('xml' !== strtolower((string) $format) || empty($data) || !is_array($data)) {
            return false;
        }

        return parent::supportsDenormalization($data, $type, $format);
    }

    public function getSupportedTypes(?string $format): array
    {
        return ['object' => true];
    }
}
