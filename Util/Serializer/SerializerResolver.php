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

namespace Plugin\AceClient43\Util\Serializer;

use Symfony\Component\Serializer\SerializerInterface;

/**
 * シリアライザリゾルバー - 動的シリアライザ選択（優先度対応 + キャッシュ）
 */
class SerializerResolver
{
    /**
     * @var SerializerInterface[] 優先度順でソート済みのシリアライザ群
     */
    private array $serializers = [];

    /**
     * @var array<string, SerializerInterface|null> 解決結果のキャッシュ
     */
    private array $resolveCache = [];

    /**
     * @var array<string, bool> サポート判定のキャッシュ
     */
    private array $supportsCache = [];

    /**
     * コンストラクタ
     *
     * @param iterable $serializers シリアライザ群
     */
    public function __construct(iterable $serializers)
    {
        $this->initializeSerializers($serializers);
    }

    /**
     * シリアライゼーション用のシリアライザを解決
     *
     * @param string $apiType APIタイプ
     * @param string $format フォーマット
     *
     * @return SerializerInterface|null
     */
    public function resolveForSerialization(string $apiType, string $format): ?SerializerInterface
    {
        return $this->resolve($apiType, $format);
    }

    /**
     * デシリアライゼーション用のシリアライザを解決
     *
     * @param string $apiType APIタイプ
     * @param string $format フォーマット
     *
     * @return SerializerInterface|null
     */
    public function resolveForDeserialization(string $apiType, string $format): ?SerializerInterface
    {
        return $this->resolve($apiType, $format);
    }

    /**
     * シリアライザを解決（優先度順 + キャッシュ）
     *
     * @param string $apiType APIタイプ
     * @param string $format フォーマット
     *
     * @return SerializerInterface|null
     */
    private function resolve(string $apiType, string $format): ?SerializerInterface
    {
        $cacheKey = $this->createCacheKey($apiType, $format);

        // キャッシュから結果を取得
        if (array_key_exists($cacheKey, $this->resolveCache)) {
            return $this->resolveCache[$cacheKey];
        }

        // キャッシュにない場合は解決処理を実行
        $resolvedSerializer = null;
        foreach ($this->serializers as $serializer) {
            if ($this->supports($serializer, $apiType, $format)) {
                $resolvedSerializer = $serializer;
                break;
            }
        }

        // 結果をキャッシュして返す
        $this->resolveCache[$cacheKey] = $resolvedSerializer;

        return $resolvedSerializer;
    }

    /**
     * シリアライザがAPIタイプとフォーマットをサポートするかチェック（キャッシュ付き）
     *
     * @param SerializerInterface $serializer シリアライザ
     * @param string $apiType APIタイプ
     * @param string $format フォーマット
     *
     * @return bool
     */
    private function supports(SerializerInterface $serializer, string $apiType, string $format): bool
    {
        $cacheKey = $this->createSupportsCacheKey($serializer, $apiType, $format);

        // キャッシュから結果を取得
        if (array_key_exists($cacheKey, $this->supportsCache)) {
            return $this->supportsCache[$cacheKey];
        }

        // キャッシュにない場合はサポート判定を実行
        $supports = false;
        if ($serializer instanceof SerializerSupportInterface) {
            $supports = $serializer->supports($apiType, $format);
        } else {
            // フォールバック: クラス名ベースの判定
            $className = get_class($serializer);
            $apiTypeMatch = stripos($className, $apiType) !== false;
            $formatMatch = stripos($className, $format) !== false;
            $supports = $apiTypeMatch && $formatMatch;
        }

        // 結果をキャッシュして返す
        $this->supportsCache[$cacheKey] = $supports;

        return $supports;
    }

    /**
     * シリアライザを初期化し、優先度順でソート
     *
     * @param iterable $serializers シリアライザ群
     */
    private function initializeSerializers(iterable $serializers): void
    {
        $serializersWithPriority = [];

        foreach ($serializers as $serializer) {
            $priority = $serializer instanceof SerializerSupportInterface
                ? $serializer->getPriority()
                : 50; // Default priority for serializers without priority support

            $serializersWithPriority[] = ['serializer' => $serializer, 'priority' => $priority];
        }

        // Sort by priority (highest first)
        usort($serializersWithPriority, function ($a, $b) {
            return $b['priority'] <=> $a['priority'];
        });

        $this->serializers = array_map(
            function ($item) {
                return $item['serializer'];
            },
            $serializersWithPriority
        );
    }

    /**
     * 解決キャッシュ用のキーを作成
     *
     * @param string $apiType APIタイプ
     * @param string $format フォーマット
     *
     * @return string
     */
    private function createCacheKey(string $apiType, string $format): string
    {
        return "resolve:{$apiType}:{$format}";
    }

    /**
     * サポート判定キャッシュ用のキーを作成
     *
     * @param SerializerInterface $serializer シリアライザ
     * @param string $apiType APIタイプ
     * @param string $format フォーマット
     *
     * @return string
     */
    private function createSupportsCacheKey(SerializerInterface $serializer, string $apiType, string $format): string
    {
        $serializerHash = spl_object_hash($serializer);

        return "supports:{$serializerHash}:{$apiType}:{$format}";
    }

    /**
     * キャッシュをクリア（主にテスト用）
     *
     * @return void
     */
    public function clearCache(): void
    {
        $this->resolveCache = [];
        $this->supportsCache = [];
    }

    /**
     * キャッシュ統計を取得（デバッグ用）
     *
     * @return array
     */
    public function getCacheStats(): array
    {
        return [
            'resolve_cache_size' => count($this->resolveCache),
            'supports_cache_size' => count($this->supportsCache),
            'resolve_cache_keys' => array_keys($this->resolveCache),
            'supports_cache_keys' => array_keys($this->supportsCache),
        ];
    }
}
