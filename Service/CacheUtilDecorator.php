<?php

namespace Plugin\AceClient43\Service;

use Eccube\Util\CacheUtil;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Event\TerminateEvent;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * CacheUtilデコレーター
 *
 * EC-CUBEのCacheUtilサービスをデコレートしてキャッシュクリア操作にフックします。
 * 管理画面またはCLIからキャッシュがクリアされた際、フロントサーバーへの同期をトリガーします。
 *
 * このアプローチはkernel.terminateイベントリスナーよりも信頼性が高く、
 * CacheUtilのforceClearCacheメソッドに直接フックするため実行が保証されます。
 */
class CacheUtilDecorator extends CacheUtil
{
    private CacheUtil $decorated;
    private CacheClearSyncService $cacheClearSyncService;
    private LoggerInterface $logger;

    public function __construct(
        CacheUtil $decorated,
        KernelInterface $kernel,
        ContainerInterface $container,
        CacheClearSyncService $cacheClearSyncService,
        LoggerInterface $logger,
    ) {
        // Call parent constructor to initialize kernel and container
        parent::__construct($kernel, $container);

        $this->decorated = $decorated;
        $this->cacheClearSyncService = $cacheClearSyncService;
        $this->logger = $logger;
    }

    /**
     * デコレートされたサービスにキャッシュクリアを委譲し、同期をトリガー
     *
     * @param string|null $env
     */
    public function clearCache($env = null)
    {
        // Call original CacheUtil::clearCache()
        $this->decorated->clearCache($env);
    }

    /**
     * キャッシュクリア後に同期をトリガーするためforceClearCacheにフック
     *
     * このメソッドはレスポンス送信後にkernel.terminateイベントから呼び出されます。
     * フロントサーバーへのキャッシュ同期をトリガーする最適な場所です。
     *
     * @param TerminateEvent $event
     *
     * @return string|null
     */
    public function forceClearCache(TerminateEvent $event)
    {
        // Call original CacheUtil::forceClearCache()
        $output = $this->decorated->forceClearCache($event);

        // Only trigger sync if cache was actually cleared
        // (output will be null if clearCacheAfterResponse was false)
        if ($output === null) {
            return null;
        }

        // Trigger cache sync to front servers (after local cache is cleared)
        try {
            $this->logger->info('[CacheUtilDecorator] Cache cleared locally, triggering sync to front servers');

            $syncResult = $this->cacheClearSyncService->clear();

            if ($syncResult['success']) {
                $this->logger->info('[CacheUtilDecorator] Cache sync to front servers completed successfully', [
                    'results' => $syncResult['results'],
                ]);
            } else {
                $this->logger->warning('[CacheUtilDecorator] Cache sync to front servers failed', [
                    'message' => $syncResult['message'],
                    'results' => $syncResult['results'],
                ]);
            }
        } catch (\Exception $e) {
            // Graceful degradation: log error but don't affect cache clearing
            $this->logger->error('[CacheUtilDecorator] Exception during cache sync', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }

        return $output;
    }

    /**
     * デコレートされたサービスに委譲
     *
     * @return string|null
     */
    public function clearDoctrineCache()
    {
        return $this->decorated->clearDoctrineCache();
    }

    /**
     * デコレートされたサービスに委譲
     */
    public function clearTwigCache()
    {
        $this->decorated->clearTwigCache();
    }

    /**
     * デコレートされたサービスに委譲（静的メソッド - 後方互換性のため）
     *
     * @param mixed $app
     * @param bool $isAll
     * @param bool $isTwig
     *
     * @return bool
     */
    public static function clear($app, $isAll, $isTwig = false)
    {
        return CacheUtil::clear($app, $isAll, $isTwig);
    }
}
