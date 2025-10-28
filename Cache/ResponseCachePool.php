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

namespace Plugin\AceClient43\Cache;

use Symfony\Component\HttpFoundation\RequestStack;

/**
 * ResponseCachePool - APIレスポンスのセッションベースキャッシュ
 *
 * RequestCachePoolが生リクエストをキャッシュするのとは異なり、
 * このクラスは処理済みのレスポンスオブジェクト（例: LoginMemberModelInterfaceインスタンス）をキャッシュします
 */
class ResponseCachePool
{
    private const CACHE_KEY_PREFIX = '_ace_res_cache';

    private RequestStack $requestStack;
    private int $defaultTtl;

    public function __construct(
        RequestStack $requestStack,
        int $defaultTtl = 300,
    ) {
        $this->requestStack = $requestStack;
        $this->defaultTtl = $defaultTtl;
    }

    /**
     * キャッシュされたレスポンスを取得、またはコールバックを実行して結果をキャッシュする
     *
     * @param string $key キャッシュキー
     * @param callable $callback キャッシュミス時に実行するコールバック、レスポンスオブジェクトを返す必要があります
     * @param int|null $ttl 有効期限（秒）、nullの場合はデフォルト値を使用
     *
     * @return mixed キャッシュされた、または新しく生成されたレスポンス
     */
    public function get(string $key, callable $callback, ?int $ttl = null)
    {
        $session = $this->getSession();
        if (!$session) {
            return $callback();
        }

        $cacheKey = self::generateCacheKey($key);
        $cached = $session->get($cacheKey);

        if ($cached !== null && isset($cached['expires_at']) && isset($cached['data'])) {
            if ($cached['expires_at'] > time()) {
                return $cached['data'];
            }
            // 期限切れ、削除する
            $session->remove($cacheKey);
        }

        // キャッシュミスまたは期限切れ、コールバックを実行
        $result = $callback();

        // 結果をキャッシュ
        $ttl = $ttl ?? $this->defaultTtl;
        $session->set($cacheKey, [
            'data' => $result,
            'expires_at' => time() + $ttl,
        ]);

        return $result;
    }

    public function isCacheStillValid(string $key, ?int $ttl = null): bool
    {
        $session = $this->getSession();
        if (!$session) {
            return false;
        }

        $cacheKey = self::generateCacheKey($key);
        $cached = $session->get($cacheKey);

        if ($cached !== null && isset($cached['expires_at']) && isset($cached['data'])) {
            if ($cached['expires_at'] > time()) {
                return true;
            }
        }

        return false;
    }

    /**
     * 特定のキャッシュされたレスポンスを削除
     *
     * @param string $key キャッシュキー
     */
    public function remove(string $key): void
    {
        $session = $this->getSession();
        if (!$session) {
            return;
        }

        $cacheKey = $this->generateCacheKey($key);
        $session->remove($cacheKey);
    }

    public function removeCacheByPrefix(string $domainPrefix): void
    {
        $session = $this->getSession();
        if (!$session) {
            return;
        }

        // すべてのセッションキーを取得し、プレフィックスが一致するものを削除
        $keys = array_keys($session->all());
        $prefix = self::generateCacheKey($domainPrefix);
        foreach ($keys as $key) {
            if (strpos($key, $prefix) === 0) {
                $session->remove($key);
            }
        }
    }

    /**
     * すべてのキャッシュされたレスポンスを削除
     */
    public function removeAll(): void
    {
        $session = $this->getSession();
        if (!$session) {
            return;
        }

        // すべてのセッションキーを取得し、プレフィックスが一致するものを削除
        $keys = array_keys($session->all());
        foreach ($keys as $key) {
            if (strpos($key, self::CACHE_KEY_PREFIX) === 0) {
                $session->remove($key);
            }
        }
    }

    /**
     * 現在のセッションを取得
     *
     * @return \Symfony\Component\HttpFoundation\Session\SessionInterface|null
     */
    private function getSession()
    {
        $request = $this->requestStack->getCurrentRequest();
        if (!$request || !$request->hasSession()) {
            return null;
        }

        return $request->getSession();
    }

    public static function generateCacheKey(string $key): string
    {
        return self::CACHE_KEY_PREFIX.'.'.$key;
    }
}
