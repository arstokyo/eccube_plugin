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

use Plugin\AceClient43\AceServices\Model\Response\AsListDenormalizableInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\NotDeserializableException;
use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * 外部APIサービスからのAsListレスポンス構造を処理するカスタムデノーマライザー
 *
 * このデノーマライザーは、AsListDenormalizableInterfaceを実装するAPIレスポンス内の
 * ネストされた配列構造を処理します。'@diffgr:id'属性を持つオブジェクトを含む配列の
 * 特殊なケースを処理し、適切なオブジェクトコレクションに変換します。
 *
 * 主な機能:
 * - ネストされたリストプロパティからオブジェクト配列への自動検出と変換
 * - DiffGramフォーマット('@diffgr:id'マーカーを持つ配列)の処理
 * - パスキャッシングによる無限再帰の防止
 * - カスタマイズ可能なレスポンスタイプのモデル解決
 * - コンテキストフラグを使用した再入防止
 *
 * 使用例:
 * APIが次のような構造を返す場合:
 * ```php
 * [
 *     'Items' => [
 *         '@diffgr:id' => 'Item1',
 *         'name' => 'Product A'
 *     ]
 * ]
 * ```
 * このデノーマライザーはItemオブジェクトの配列に変換します。
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AsListDenormalizer implements DenormalizerAwareInterface, SerializerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    /**
     * 配列でラップすべき単一オブジェクトを識別するために使用されるDiffGram IDマーカー
     *
     * @var string
     */
    public const DIFF_GR_ID = '@diffgr:id';

    /**
     * レスポンスモデルクラスの検索と解決を行うモデルリゾルバー
     *
     * @var ModelResolver
     */
    private $modelResolver;

    /**
     * 無限再帰を防止するためのデシリアライゼーションパスのキャッシュ
     *
     * 循環参照を検出するために現在処理中のパスを保存します。
     *
     * @var array<int, string>
     */
    private $cachePath = [];

    /**
     * タイプ別に解決されたAsListPropertyマッピングのキャッシュ
     *
     * AsListDenormalizableInterfaceを実装する各タイプに対して、
     * プロパティ名と対応するクラス名のマッピングを保存します。
     *
     * @var array<string, array<string, string>>
     */
    private $cacheAsList = [];

    /**
     * 新しいAsListDenormalizerインスタンスを構築します
     *
     * @param ModelResolver $modelResolver モデルクラス名を解決するサービス
     */
    public function __construct(ModelResolver $modelResolver)
    {
        $this->modelResolver = $modelResolver;
    }

    /**
     * AsListDenormalizableInterfaceを実装するオブジェクトにデータをデノーマライズします
     *
     * このメソッドは以下の処理により入力データを処理します:
     * 1. 対象タイプがAsListDenormalizableInterfaceを実装していることを検証
     * 2. 無限ループを防ぐため、現在のデシリアライゼーションパスをキャッシュ
     * 3. 対象タイプからAsListProperty定義を取得して処理
     * 4. プロパティ定義に基づいて、ネストされた配列をオブジェクトの配列に変換
     * 5. 単一オブジェクトが'@diffgr:id'マーカーを持つ特殊なDiffGramフォーマットの処理
     * 6. チェーン内の次のデノーマライザーに最終的なデノーマライゼーションを委譲
     *
     * デシリアライゼーションパスは、ネストされた処理を追跡し、循環参照を防ぐために
     * 使用されます。例: "[Items][Details]"はネストされたプロパティを通過するパスを表します。
     *
     * @param mixed       $data    デノーマライズするデータ(配列を想定)
     * @param string      $type    ターゲットクラス名(AsListDenormalizableInterfaceを実装する必要がある)
     * @param string|null $format  デシリアライズ元のフォーマット(例: 'json', 'xml')
     * @param array       $context デノーマライゼーションのコンテキストオプション。以下を含む:
     *                             - 'deserialization_path': データ構造内の現在のパス
     *                             - '__as_list_done': 再入を防ぐフラグ
     *
     * @return object 指定されたタイプのデノーマライズされたオブジェクト
     *
     * @throws DataTypeMissMatchException タイプがAsListDenormalizableInterfaceを実装していない場合、
     *                                    またはプロパティ定義が無効な場合
     * @throws NotDeserializableException デノーマライゼーションが何らかの理由で失敗した場合
     *
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function denormalize($data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (!\in_array(AsListDenormalizableInterface::class, class_implements($type), true)) {
            throw new DataTypeMissMatchException('AsListDenormalizer Error: Expected AsListDenormalizableInterface object');
        }

        if (isset($context['deserialization_path'])) {
            $this->cachePath[] = $context['deserialization_path'];
        }

        $asListProperty = $this->fetchAsListProperty($type);

        try {
            foreach ($asListProperty as $key => $value) {
                if (isset($data[$key]) && \is_array($data[$key])) {
                    $innerData = $data[$key];

                    // Handle DiffGram format: if the array has a '@diffgr:id' key,
                    // it represents a single object that should be wrapped in an array
                    if (\array_key_exists(self::DIFF_GR_ID, $innerData)) {
                        $innerData = [$innerData];
                    }

                    // Build deserialization path for nested tracking
                    $subContext = $context;
                    $subContext['deserialization_path'] = isset($context['deserialization_path'])
                        ? sprintf('%s[%s]', $context['deserialization_path'], $key)
                        : "[$key]";

                    // Denormalize the nested array into an array of objects
                    $data[$key] = $this->denormalizer->denormalize($innerData, $value.'[]', $format, $subContext);
                }
            }

            // Mark that array-to-object conversion is complete to prevent re-entry
            $finalContext = $context;
            $finalContext['__as_list_done'] = true;

            // Perform final denormalization with the processed data
            $result = $this->denormalizer->denormalize($data, $type, $format, $finalContext);
        } catch (\Throwable $e) {
            throw new NotDeserializableException(sprintf('Could not deserialize as list response. %s', $e->getMessage()), $e);
        } finally {
            // Clean up the path cache to allow subsequent processing
            if (isset($context['deserialization_path'])) {
                $this->unsetCachePath($context['deserialization_path']);
            }
        }

        return $result;
    }

    /**
     * 指定されたタイプのAsListProperty定義を取得してキャッシュします
     *
     * このメソッドは、ターゲットタイプのfetchAsListProperty()メソッドから
     * プロパティ名とクラス名のマッピングを取得し、ModelResolverを使用して
     * 実際のモデルクラスを解決します。
     *
     * 結果はキャッシュされ、繰り返しのリフレクションと解決操作を回避します。
     *
     * "Customize"で始まるプロパティはモデル解決からスキップされ、
     * 派生実装でカスタム処理を可能にします。
     *
     * @param string $type AsListDenormalizableInterfaceを実装する完全修飾クラス名
     *
     * @return array<string, string> プロパティ名と解決されたクラス名のマップ
     *
     * @throws DataTypeMissMatchException プロパティ値が有効なクラス名でない場合
     */
    private function fetchAsListProperty(string $type)
    {
        if (isset($this->cacheAsList[$type])) {
            return $this->cacheAsList[$type];
        }

        $asListProperty = $type::fetchAsListProperty();

        foreach ($asListProperty as $key => $value) {
            // Skip model resolution for properties starting with "Customize"
            if (strpos($value, 'Customize') === 0) {
                continue;
            }

            if (!\is_string($value) || !\class_exists($value)) {
                throw new DataTypeMissMatchException(sprintf('AsListDenormalizer Error: Expected class name for property "%s" in type "%s".', $key, $type));
            }

            // Resolve the actual response model class
            $asListProperty[$key] = $this->modelResolver->findResponseModel($value);
        }

        // Cache the resolved property map
        return $this->cacheAsList[$type] = $asListProperty;
    }

    /**
     * キャッシュからデシリアライゼーションパスを削除します
     *
     * このメソッドは、denormalize()のfinallyブロックで呼び出され、
     * パスの追跡をクリーンアップし、異なるコンテキストで同じパスを
     * 再度処理できるようにします。
     *
     * @param string $path キャッシュから削除するデシリアライゼーションパス
     *
     * @return void
     */
    private function unsetCachePath($path)
    {
        $key = array_search($path, $this->cachePath, true);
        if ($key !== false) {
            unset($this->cachePath[$key]);
        }
    }

    /**
     * このデノーマライザーが指定されたデータとタイプを処理できるかどうかを判定します
     *
     * このメソッドは、無限再帰を防ぎ、適切な処理を保証するために
     * 3つの主要なチェックを実行します:
     *
     * 1. ターゲットタイプがAsListDenormalizableInterfaceを実装しており、
     *    データが空でない配列であることを検証
     * 2. '__as_list_done'フラグが設定されている場合はfalseを返し、
     *    第一段階の配列からオブジェクトへの変換が完了していることを示す
     * 3. 現在のデシリアライゼーションパスが既に処理中かどうかをチェックし、
     *    循環参照を防止
     *
     * @param mixed       $data    デノーマライズするデータ
     * @param string      $type    ターゲットクラス名
     * @param string|null $format  デシリアライズ元のフォーマット
     * @param array       $context コンテキストオプション。以下を含む:
     *                             - '__as_list_done': 第一段階完了を示すフラグ
     *                             - 'deserialization_path': 再帰追跡のための現在のパス
     *
     * @return bool このデノーマライザーがデータを処理すべき場合はtrue、そうでない場合はfalse
     */
    public function supportsDenormalization($data, string $type, ?string $format = null, array $context = [])
    {
        // Check 1: Verify interface implementation and data validity
        if (!\in_array(AsListDenormalizableInterface::class, class_implements($type), true)
            || !\is_array($data)
            || empty($data)) {
            return false;
        }

        // Check 2: Skip if first-pass conversion is already complete
        if (isset($context['__as_list_done']) && $context['__as_list_done'] === true) {
            return false;
        }

        // Check 3: Prevent infinite recursion by checking cached paths
        if (isset($context['deserialization_path'])) {
            return !\in_array($context['deserialization_path'], $this->cachePath, true);
        }

        // Allow processing if no path information is present
        return true;
    }

    /**
     * このデノーマライザーのシリアライザーを設定します
     *
     * シリアライザーは、デノーマライゼーション操作の委譲を可能にするため、
     * DenormalizerInterfaceも実装する必要があります。
     *
     * @param SerializerInterface $serializer 使用するシリアライザーインスタンス
     *
     * @return void
     *
     * @throws InvalidArgumentException シリアライザーがDenormalizerInterfaceを実装していない場合
     */
    public function setSerializer(SerializerInterface $serializer)
    {
        if (!$serializer instanceof DenormalizerInterface) {
            throw new InvalidArgumentException('Expected a serializer that also implements DenormalizerInterface.');
        }

        $this->setDenormalizer($serializer);
    }

    /**
     * このデノーマライザーがサポートするタイプを返します
     *
     * このメソッドは、Symfony Serializerコンポーネントが指定されたタイプに対して
     * どのデノーマライザーを使用するかを決定するために使用されます。
     *
     * @param string|null $format デシリアライズ元のフォーマット(この実装では使用されません)
     *
     * @return array<string, bool> サポートされるタイプと優先度フラグのマップ
     */
    public function getSupportedTypes(?string $format)
    {
        return [
            AsListDenormalizableInterface::class => false,
        ];
    }
}
