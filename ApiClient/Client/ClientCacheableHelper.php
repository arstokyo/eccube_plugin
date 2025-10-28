<?php

namespace Plugin\AceClient43\ApiClient\Client;

use Plugin\AceClient43\Util\DataCollector\TraceableApiClientInterface;

/**
 * クライアントキャッシュヘルパー
 *
 * キャッシュ可能クライアントを扱うための型安全なメソッドを提供します
 */
final class ClientCacheableHelper
{
    /**
     * クライアントがキャッシュをサポートしているかチェック
     *
     * @param ClientInterface $client クライアントインスタンス
     *
     * @return bool キャッシュ可能な場合はtrue
     */
    public static function isCacheable(ClientInterface $client): bool
    {
        if ($client instanceof TraceableApiClientInterface) {
            return $client->isRequestCacheableClient();
        }

        return $client instanceof RequestCacheableClientInterface;
    }

    /**
     * サポートされている場合、クライアントのキャッシュを有効化
     *
     * @param ClientInterface $client クライアントインスタンス
     * @param callable $factory リクエスト作成ファクトリー
     * @param callable|null $modifier オプションの修飾子
     *
     * @return ClientInterface クライアントインスタンス
     */
    public static function enableCaching(
        ClientInterface $client,
        callable $factory,
        ?string $cacheKey = null,
        ?callable $modifier = null,
    ): ClientInterface {
        if (self::isCacheable($client)) {
            $client->withCaching($factory, $cacheKey, $modifier);
        }

        return $client;
    }

    /**
     * サポートされている場合、クライアントのキャッシュを無効化
     *
     * @param ClientInterface $client クライアントインスタンス
     *
     * @return ClientInterface クライアントインスタンス
     */
    public static function disableCaching(ClientInterface $client): ClientInterface
    {
        if (self::isCacheable($client)) {
            $client->withoutCaching();
        }

        return $client;
    }

    /**
     * サポートされている場合、クライアントのキャッシュをクリア
     *
     * @param ClientInterface $client クライアントインスタンス
     *
     * @return void
     */
    public static function clearCache(ClientInterface $client): void
    {
        if (self::isCacheable($client)) {
            $client->clearCache();
        }
    }
}
