<?php

namespace Plugin\AceClient43\ApiClient\Client;

use Plugin\AceClient43\Cache\RequestCachePool;

/**
 * リクエストキャッシュ可能クライアントインターフェース
 *
 * リクエストキャッシュをサポートするクライアントの契約を定義します。
 * RequestCachingTraitと連携して動作します。
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface RequestCacheableClientInterface extends ClientInterface
{
    /**
     * キャッシュプールインスタンスを設定
     *
     * @param RequestCachePool $cachePool キャッシュプール
     *
     * @return void
     */
    public function setRequestCachePool(RequestCachePool $cachePool): void;

    /**
     * ファクトリーとオプションの修飾子でキャッシュを有効化
     *
     * @param callable $requestFactory キャッシュミス時にリクエストDTOを作成するファクトリー
     *                                 シグネチャ: fn(): RequestModelInterface
     * @param string|null $cacheKey キャッシュキー
     * @param callable|null $requestModifier キャッシュされたXMLを修正するオプションの修飾子
     *                                        シグネチャ: fn(string $rawXml): string
     *
     * @return self
     */
    public function withCaching(callable $requestFactory, ?string $cacheKey = null, ?callable $requestModifier = null): self;

    /**
     * このリクエストのキャッシュを無効化
     * 新規リクエスト作成とシリアライズを強制します
     *
     * @return self
     */
    public function withoutCaching(): self;

    /**
     * 現在のエンドポイントのキャッシュをクリア
     *
     * @return void
     */
    public function clearCache(): void;
}
