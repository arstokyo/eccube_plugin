<?php

namespace Plugin\AceClient43\ApiClient\Client;

use Plugin\AceClient43\Cache\RequestCachePool;
use Plugin\AceClient43\Exception\CanNotBuildRequestException;

/**
 * リクエストキャッシュトレイト
 *
 * APIクライアント用のセッションベースのリクエストキャッシュ機能を提供します。
 *
 * 使用方法:
 * 1. RequestCacheableClientインターフェースを実装
 * 2. クライアントクラスでこのトレイトを使用
 * 3. setCacheManager()経由でRequestCacheManagerを注入
 *
 * 機能:
 * - セッションベースのキャッシュ（エンドポイント毎）
 * - ファクトリーパターンによる遅延リクエスト作成
 * - キャッシュされたリクエストの動的フィールド修正
 * - 明示的なキャッシュの有効化/無効化
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait RequestCacheableClientTrait
{
    /** @var RequestCachePool|null キャッシュプール */
    protected ?RequestCachePool $requestCachePool = null;

    /** @var callable|null キャッシュミス時にリクエストDTOを作成するファクトリー */
    protected $requestFactory;

    /** @var callable|null キャッシュされたデータに適用する修飾子 */
    protected $requestModifier;

    /** @var string|null キャッシュキー */
    protected ?string $cacheKey = '';

    /** @var bool このリクエストでキャッシュを使用するかどうか */
    protected bool $enableCaching = false;

    protected bool $isRequestFromCache = false;

    /**
     * キャッシュプールインスタンスを設定
     *
     * 依存性注入コンテナから呼び出されます
     *
     * @param RequestCachePool $cachePool キャッシュプール
     *
     * @return void
     */
    public function setRequestCachePool(RequestCachePool $cachePool): void
    {
        $this->requestCachePool = $cachePool;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata(): ClientMetadataInterface
    {
        $request = $this->request;

        if (empty($request) && $this->isRequestFromCache) {
            $request = $this->requestCachePool->getRequestModel($this->cacheKey) ?? null;
        }

        return new ClientMetadata($this->requestMethod, $this->endpoint, $request ?? [], $this->isRequestFromCache);
    }

    /**
     * ファクトリーとオプションの修飾子でキャッシュを有効化
     *
     * @param callable $requestFactory キャッシュミス時にリクエストDTOを作成するファクトリー
     *                                 シグネチャ: fn(): RequestModelInterface
     * @param string|null $cacheKey キャッシュキー
     * @param callable|null $requestModifier キャッシュされたデータに適用するオプションの修飾子
     *                                        シグネチャ: fn(string $rawXml): string
     *
     * @return self
     */
    public function withCaching(callable $requestFactory, ?string $cacheKey = null, ?callable $requestModifier = null): self
    {
        $this->requestFactory = $requestFactory;
        $this->requestModifier = $requestModifier;
        $this->cacheKey = $cacheKey ?? $this->endpoint;
        $this->enableCaching = true;

        return $this;
    }

    /**
     * このリクエストのキャッシュを無効化
     *
     * 新規リクエスト作成とシリアライズを強制します。
     * 確実に最新のデータが必要な場合に便利です。
     *
     * @return self
     */
    public function withoutCaching(): self
    {
        $this->enableCaching = false;
        $this->requestFactory = null;
        $this->cacheKey = null;
        $this->requestModifier = null;

        return $this;
    }

    /**
     * キャッシュを使用してリクエストを取得または作成
     *
     * フロー:
     * 1. キャッシュ無効の場合 -> 直接シリアライズ
     * 2. キャッシュをチェック -> ヒットした場合、修飾子を適用して返却
     * 3. キャッシュミス -> ファクトリーを使用してリクエストを作成
     * 4. シリアライズしてキャッシュに保存
     *
     * @return string シリアライズされたリクエスト（XML/JSON）
     *
     * @throws CanNotBuildRequestException
     */
    protected function getOrCreateCachedRequest(): string
    {
        // キャッシュが無効の場合、直接シリアライズ
        if (!$this->enableCaching || $this->requestCachePool === null) {
            return $this->serializeRequest();
        }

        // キャッシュから取得を試みる
        $cached = $this->requestCachePool->get($this->cacheKey);

        if ($cached !== null) {
            $this->isRequestFromCache = true;

            // キャッシュヒット - 修飾子が提供されている場合は適用
            if ($this->requestModifier !== null) {
                $cached = ($this->requestModifier)($cached);
            }

            return $cached;
        }

        // キャッシュミス - ファクトリーまたは既存のリクエストを使用して作成
        if ($this->requestFactory !== null) {
            $this->request = ($this->requestFactory)();
        }

        if (empty($this->request)) {
            $this->logger->warning('[Client] キャッシュ用のリクエストがありません');

            return '';
        }

        // シリアライズしてキャッシュ
        $serialized = $this->serializeRequest();
        $this->requestCachePool->set($this->cacheKey, $this->request, $serialized);

        return $serialized;
    }

    /**
     * 現在のエンドポイントのキャッシュをクリア
     *
     * データが変更されたことがわかっており、キャッシュを無効化する必要がある場合に便利です。
     *
     * @return void
     */
    public function clearCache(): void
    {
        if ($this->requestCachePool !== null && !empty($this->cacheKey)) {
            $this->requestCachePool->clear($this->cacheKey);
        }
    }
}
