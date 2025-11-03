<?php

namespace Plugin\AceClient43\Cache;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * リクエストキャッシュプール - APIリクエストの集中キャッシュ管理
 *
 * エンドポイントをキーとしたセッションベースのキャッシュを管理します
 * TTL（有効期限）機能をサポートし、期限切れのキャッシュは自動的に無効化されます
 */
class RequestCachePool
{
    private const CACHE_PREFIX = 'ace_req_cache';
    private const CACHE_TIMESTAMP_SUFFIX = '_timestamp';
    private const CACHE_REQUEST_MODEL_SUFFIX = '_req_model';

    private RequestStack $requestStack;
    private LoggerInterface $logger;
    private int $defaultTtl;

    private bool $isDebug;

    public function __construct(
        RequestStack $requestStack,
        LoggerInterface $logger,
        int $defaultTtl,
        bool $isDebug,
    ) {
        $this->requestStack = $requestStack;
        $this->logger = $logger;
        $this->defaultTtl = $defaultTtl;
        $this->isDebug = $isDebug;
    }

    /**
     * エンドポイントによるキャッシュされたリクエストを取得
     *
     * TTLをチェックし、期限切れの場合はnullを返します
     *
     * @param string $cacheKey エンドポイント
     * @param int|null $ttl オプションのTTL（秒）。nullの場合はデフォルトTTLを使用
     *
     * @return string|null キャッシュされたシリアライズ済みリクエスト、見つからない場合または期限切れの場合はnull
     */
    public function get(string $cacheKey, ?int $ttl = null): ?string
    {
        $key = $this->generateKey($cacheKey);
        $timestampKey = $this->generateTimestampKey($cacheKey);
        $session = $this->requestStack->getSession();

        $cached = $session->get($key);
        $timestamp = $session->get($timestampKey);

        // キャッシュが存在しない場合
        if ($cached === null || $timestamp === null) {
            return null;
        }

        // TTLチェック
        $effectiveTtl = $ttl ?? $this->defaultTtl;
        $now = time();
        $age = $now - $timestamp;

        if ($age > $effectiveTtl) {
            // 期限切れキャッシュを削除
            $session->remove($key);
            $session->remove($timestampKey);
            if ($this->isDebug) {
                $requestModelKey = $this->generateRequestModelKey($cacheKey);
                $session->remove($requestModelKey);
            }

            return null;
        }

        return $cached;
    }

    public function getRequestModel(string $endpoint): ?RequestModelInterface
    {
        $session = $this->requestStack->getSession();
        $requestModelKey = $this->generateRequestModelKey($endpoint);

        return $session->get($requestModelKey);
    }

    /**
     * リクエストをキャッシュに保存
     *
     * 現在のタイムスタンプと共にキャッシュを保存します
     *
     * @param string $cacheKey エンドポイント
     * @param \JsonSerializable|RequestModelInterface|array<mixed, mixed>|string $request リクエストモデル
     * @param string $serializedRequest シリアライズ済みリクエスト
     * @param int|null $ttl オプションのTTL（秒）。nullの場合はデフォルトTTLを使用
     */
    public function set(string $cacheKey, $request, string $serializedRequest, ?int $ttl = null): void
    {
        $key = $this->generateKey($cacheKey);
        $timestampKey = $this->generateTimestampKey($cacheKey);
        $session = $this->requestStack->getSession();
        $now = time();

        $session->set($key, $serializedRequest);
        $session->set($timestampKey, $now);

        if ($this->isDebug) {
            $requestModelKey = $this->generateRequestModelKey($cacheKey);
            $session->set($requestModelKey, $request);
        }
    }

    /**
     * 特定エンドポイントのキャッシュをクリア
     *
     * @param string $cacheKey エンドポイント
     */
    public function clear(string $cacheKey): void
    {
        $key = $this->generateKey($cacheKey);
        $timestampKey = $this->generateTimestampKey($cacheKey);
        $session = $this->requestStack->getSession();

        $session->remove($key);
        $session->remove($timestampKey);
        if ($this->isDebug) {
            $requestModelKey = $this->generateRequestModelKey($cacheKey);
            $session->remove($requestModelKey);
        }

        $this->logger->debug('[RequestCacheManager] キャッシュクリア', [
            'endpoint' => $cacheKey,
            'cache_key' => $key,
        ]);
    }

    /**
     * すべてのリクエストキャッシュをクリア
     */
    public function clearAll(): void
    {
        $session = $this->requestStack->getSession();
        $keys = array_keys($session->all());

        $cleared = 0;
        foreach ($keys as $key) {
            if (strpos($key, self::CACHE_PREFIX) === 0) {
                $session->remove($key);
                $cleared++;
            }
        }

        $this->logger->debug('[RequestCacheManager] すべてのキャッシュクリア', [
            'count' => $cleared,
        ]);
    }

    /**
     * 期限切れのキャッシュをすべて削除
     *
     * セッション内のすべてのキャッシュをスキャンし、期限切れのものを削除します
     *
     * @return int 削除されたキャッシュの数
     */
    public function clearExpired(): int
    {
        $session = $this->requestStack->getSession();
        $keys = array_keys($session->all());
        $now = time();
        $cleared = 0;

        foreach ($keys as $key) {
            // タイムスタンプキーとリクエストモデルキーをスキップ
            $timestampSuffixLen = strlen(self::CACHE_TIMESTAMP_SUFFIX);
            $requestModelSuffixLen = strlen(self::CACHE_REQUEST_MODEL_SUFFIX);
            if (substr($key, -$timestampSuffixLen) === self::CACHE_TIMESTAMP_SUFFIX
                || substr($key, -$requestModelSuffixLen) === self::CACHE_REQUEST_MODEL_SUFFIX) {
                continue;
            }

            if (strpos($key, self::CACHE_PREFIX) === 0) {
                $timestampKey = $key.'.'.self::CACHE_TIMESTAMP_SUFFIX;
                $timestamp = $session->get($timestampKey);

                if ($timestamp !== null && ($now - $timestamp) > $this->defaultTtl) {
                    $session->remove($key);
                    $session->remove($timestampKey);
                    if ($this->isDebug) {
                        $requestModelKey = $key.'.'.self::CACHE_REQUEST_MODEL_SUFFIX;
                        $session->remove($requestModelKey);
                    }
                    $cleared++;
                }
            }
        }

        if ($cleared > 0) {
            $this->logger->debug('[RequestCacheManager] 期限切れキャッシュクリア', [
                'count' => $cleared,
            ]);
        }

        return $cleared;
    }

    /**
     * エンドポイントのキャッシュが存在し、有効かチェック
     *
     * @param string $endpoint エンドポイント
     * @param int|null $ttl オプションのTTL（秒）。nullの場合はデフォルトTTLを使用
     *
     * @return bool 有効なキャッシュが存在する場合はtrue
     */
    public function has(string $endpoint, ?int $ttl = null): bool
    {
        $key = $this->generateKey($endpoint);
        $timestampKey = $this->generateTimestampKey($endpoint);
        $session = $this->requestStack->getSession();

        if (!$session->has($key) || !$session->has($timestampKey)) {
            return false;
        }

        // TTLチェック
        $timestamp = $session->get($timestampKey);
        $effectiveTtl = $ttl ?? $this->defaultTtl;
        $age = time() - $timestamp;

        return $age <= $effectiveTtl;
    }

    /**
     * キャッシュの残り有効期限を取得
     *
     * @param string $endpoint エンドポイント
     * @param int|null $ttl オプションのTTL（秒）。nullの場合はデフォルトTTLを使用
     *
     * @return int|null 残り秒数、キャッシュが存在しないまたは期限切れの場合はnull
     */
    public function getTtl(string $endpoint, ?int $ttl = null): ?int
    {
        $timestampKey = $this->generateTimestampKey($endpoint);
        $session = $this->requestStack->getSession();

        $timestamp = $session->get($timestampKey);
        if ($timestamp === null) {
            return null;
        }

        $effectiveTtl = $ttl ?? $this->defaultTtl;
        $age = time() - $timestamp;
        $remaining = $effectiveTtl - $age;

        return $remaining > 0 ? $remaining : null;
    }

    /**
     * デフォルトTTLを取得
     *
     * @return int デフォルトTTL（秒）
     */
    public function getDefaultTtl(): int
    {
        return $this->defaultTtl;
    }

    /**
     * エンドポイントからキャッシュキーを生成
     *
     * @param string $endpoint エンドポイント
     *
     * @return string キャッシュキー
     */
    private function generateKey(string $endpoint): string
    {
        return self::CACHE_PREFIX.'.'.md5($endpoint);
    }

    /**
     * エンドポイントからタイムスタンプキーを生成
     *
     * @param string $endpoint エンドポイント
     *
     * @return string タイムスタンプキー
     */
    private function generateTimestampKey(string $endpoint): string
    {
        return $this->generateKey($endpoint).'.'.self::CACHE_TIMESTAMP_SUFFIX;
    }

    private function generateRequestModelKey(string $endpoint): string
    {
        return $this->generateKey($endpoint).'.'.self::CACHE_REQUEST_MODEL_SUFFIX;
    }
}
