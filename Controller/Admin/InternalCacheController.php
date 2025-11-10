<?php

namespace Plugin\AceClient43\Controller\Admin;

use Eccube\Controller\AbstractController;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * 内部キャッシュコントローラー
 *
 * キャッシュクリア操作用の内部HTTPエンドポイントを提供します。
 * 管理サーバーからフロントサーバーのキャッシュをクリアするために呼び出されることを想定しています。
 *
 * セキュリティ:
 *   - X-Cache-Sync-Tokenヘッダー検証により保護
 *   - 内部からのみアクセス可能にすべき（ファイアウォール/ネットワークルールを設定）
 */
class InternalCacheController extends AbstractController
{
    private string $authToken;
    private bool $warmupEnabled;
    private int $homepageReloadCount;
    private Client $httpClient;
    private LoggerInterface $logger;
    private KernelInterface $kernel;

    public function __construct(
        string $authToken,
        bool $warmupEnabled,
        int $homepageReloadCount,
        Client $httpClient,
        LoggerInterface $logger,
        KernelInterface $kernel,
    ) {
        $this->authToken = $authToken;
        $this->warmupEnabled = $warmupEnabled;
        $this->homepageReloadCount = $homepageReloadCount;
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->kernel = $kernel;
    }

    /**
     * 内部キャッシュクリアエンドポイント
     *
     * @Route("/aceclient/internal/cache/clear", name="admin_internal_cache_clear")
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function clear(Request $request): JsonResponse
    {
        $startTime = microtime(true);

        // Validate auth token
        $providedToken = $request->headers->get('X-Cache-Sync-Token');

        if (empty($this->authToken)) {
            $this->logger->error('[InternalCacheController] Auth token not configured on this server');

            return new JsonResponse([
                'success' => false,
                'message' => 'Internal error: auth token not configured',
            ], 500);
        }

        if (empty($providedToken) || !hash_equals($this->authToken, $providedToken)) {
            $this->logger->warning('[InternalCacheController] Unauthorized cache clear attempt', [
                'ip' => $request->getClientIp(),
                'token_provided' => !empty($providedToken),
            ]);

            return new JsonResponse([
                'success' => false,
                'message' => 'Unauthorized: invalid or missing auth token',
            ], 401);
        }

        // Get request metadata
        $requestData = json_decode($request->getContent(), true) ?? [];
        $source = $requestData['source'] ?? 'unknown';
        $timestamp = $requestData['timestamp'] ?? null;

        $this->logger->info('[InternalCacheController] Cache clear request received', [
            'source' => $source,
            'timestamp' => $timestamp,
            'ip' => $request->getClientIp(),
        ]);

        $results = [];

        try {
            // Step 1: Clear OPcache
            if (function_exists('opcache_reset')) {
                if (opcache_reset()) {
                    $results['opcache'] = 'cleared';
                    $this->logger->info('[InternalCacheController] OPcache cleared successfully');
                } else {
                    $results['opcache'] = 'failed';
                    $this->logger->warning('[InternalCacheController] OPcache reset returned false');
                }
            } else {
                $results['opcache'] = 'not_available';
                $this->logger->warning('[InternalCacheController] OPcache not available on this server');
            }

            // Step 2: Clear APC cache (if available)
            if (function_exists('apc_clear_cache')) {
                apc_clear_cache('user');
                apc_clear_cache();
                $results['apc'] = 'cleared';
                $this->logger->info('[InternalCacheController] APC cache cleared');
            }

            // Step 3: Clear WinCache (if available)
            if (function_exists('wincache_ucache_clear')) {
                wincache_ucache_clear();
                $results['wincache'] = 'cleared';
                $this->logger->info('[InternalCacheController] WinCache cleared');
            }

            // Step 4: Clear Symfony cache (no warmup)
            $this->logger->info('[InternalCacheController] Clearing Symfony cache (no warmup)');
            $cacheClearResult = $this->clearSymfonyCache();
            $results['symfony_cache'] = $cacheClearResult;

            // Step 5: Reload homepage to fix blank page issue and trigger cache rebuild
            $this->logger->info('[InternalCacheController] Reloading homepage to fix blank page and rebuild cache');
            $homepageResult = $this->reloadHomepage($request);
            $results['homepage_reload'] = $homepageResult;

            // Step 6: Warmup cache (optional)
            if ($this->warmupEnabled) {
                $this->logger->info('[InternalCacheController] Cache warmup is enabled, starting warmup');
                $warmupResult = $this->warmupCache();
                $results['cache_warmup'] = $warmupResult;
            } else {
                $this->logger->info('[InternalCacheController] Cache warmup is disabled, skipping');
                $results['cache_warmup'] = 'disabled';
            }

            $executionTime = round((microtime(true) - $startTime) * 1000, 2);

            $this->logger->info('[InternalCacheController] Cache clear completed successfully', [
                'source' => $source,
                'execution_time_ms' => $executionTime,
                'results' => $results,
            ]);

            return new JsonResponse([
                'success' => true,
                'message' => 'Cache cleared successfully',
                'hostname' => gethostname(),
                'timestamp' => time(),
                'execution_time_ms' => $executionTime,
                'results' => $results,
            ]);
        } catch (\Exception $e) {
            $executionTime = round((microtime(true) - $startTime) * 1000, 2);

            $this->logger->error('[InternalCacheController] Error during cache clear', [
                'source' => $source,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'execution_time_ms' => $executionTime,
            ]);

            return new JsonResponse([
                'success' => false,
                'message' => 'Error during cache clear: '.$e->getMessage(),
                'hostname' => gethostname(),
                'timestamp' => time(),
                'execution_time_ms' => $executionTime,
                'results' => $results,
            ], 500);
        }
    }

    /**
     * ヘルスチェックエンドポイント（オプション、監視用）
     *
     * @Route("/%eccube_admin_route%/internal/cache/health", name="admin_internal_cache_health", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function health(): JsonResponse
    {
        return new JsonResponse([
            'status' => 'ok',
            'hostname' => gethostname(),
            'timestamp' => time(),
            'opcache_enabled' => function_exists('opcache_reset'),
            'apc_enabled' => function_exists('apc_clear_cache'),
            'wincache_enabled' => function_exists('wincache_ucache_clear'),
        ]);
    }

    /**
     * ホームページをリロードして空白ページを修正し、キャッシュ再構築をトリガー
     *
     * キャッシュが適切に再構築されページが正しく読み込まれることを保証するため、複数回リクエストを行います。
     *
     * @param Request $request 現在のリクエストオブジェクト
     *
     * @return array ステータスと詳細を含む結果
     */
    private function reloadHomepage(Request $request): array
    {
        $baseUrl = $this->getBaseUrl($request);
        $successCount = 0;
        $attempts = [];

        for ($i = 1; $i <= $this->homepageReloadCount; $i++) {
            try {
                $startTime = microtime(true);

                $response = $this->httpClient->get($baseUrl, [
                    'timeout' => 30,
                    'connect_timeout' => 10,
                    'http_errors' => false,
                ]);

                $statusCode = $response->getStatusCode();
                $loadTime = round((microtime(true) - $startTime) * 1000, 2);

                $attempts[$i] = [
                    'status_code' => $statusCode,
                    'load_time_ms' => $loadTime,
                    'success' => $statusCode === 200,
                ];

                if ($statusCode === 200) {
                    $successCount++;
                    $this->logger->info("[InternalCacheController] Homepage reload attempt {$i}/{$this->homepageReloadCount} succeeded", [
                        'status_code' => $statusCode,
                        'load_time_ms' => $loadTime,
                    ]);
                } else {
                    $this->logger->warning("[InternalCacheController] Homepage reload attempt {$i}/{$this->homepageReloadCount} returned non-200 status", [
                        'status_code' => $statusCode,
                        'load_time_ms' => $loadTime,
                    ]);
                }

                // Wait 1 second between attempts to allow cache to stabilize
                if ($i < $this->homepageReloadCount) {
                    sleep(1);
                }
            } catch (GuzzleException $e) {
                $attempts[$i] = [
                    'error' => $e->getMessage(),
                    'success' => false,
                ];
                $this->logger->error("[InternalCacheController] Homepage reload attempt {$i}/{$this->homepageReloadCount} failed", [
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return [
            'status' => $successCount > 0 ? 'success' : 'failed',
            'success_count' => $successCount,
            'total_attempts' => $this->homepageReloadCount,
            'attempts' => $attempts,
        ];
    }

    /**
     * Symfonyキャッシュをクリア
     *
     * cache:clear --no-warmup --no-ansiコマンドを実行してキャッシュをクリアします。
     *
     * @return array ステータスと詳細を含む結果
     */
    private function clearSymfonyCache(): array
    {
        try {
            $startTime = microtime(true);

            $this->logger->info('[InternalCacheController] Running cache:clear --no-warmup --no-ansi');

            // Create console application
            $console = new Application($this->kernel);
            $console->setAutoExit(false);

            // Prepare command with ArrayInput
            $input = new ArrayInput([
                'command' => 'cache:clear',
                '--no-warmup' => true,
                '--no-ansi' => true,
            ]);

            // Create output buffer
            $output = new BufferedOutput(
                OutputInterface::VERBOSITY_DEBUG,
                true
            );

            // Execute command
            $returnCode = $console->run($input, $output);

            $executionTime = round((microtime(true) - $startTime) * 1000, 2);
            $outputContent = $output->fetch();

            if ($returnCode === 0) {
                $this->logger->info('[InternalCacheController] Cache clear completed successfully', [
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                ]);

                return [
                    'status' => 'cleared',
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                    'output' => $outputContent,
                ];
            } else {
                $this->logger->warning('[InternalCacheController] Cache clear returned non-zero exit code', [
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                    'output' => $outputContent,
                ]);

                return [
                    'status' => 'failed',
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                    'output' => $outputContent,
                ];
            }
        } catch (\Exception $e) {
            $this->logger->error('[InternalCacheController] Cache clear exception', [
                'error' => $e->getMessage(),
            ]);

            return [
                'status' => 'error',
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Symfonyキャッシュをウォームアップ
     *
     * cache:warmupコマンドを実行してキャッシュファイルを事前コンパイルします。
     *
     * @return array ステータスと詳細を含む結果
     */
    private function warmupCache(): array
    {
        try {
            $startTime = microtime(true);

            $cacheDir = $this->kernel->getCacheDir();

            $this->logger->info('[InternalCacheController] Running cache:warmup', [
                'cache_dir' => $cacheDir,
            ]);

            // Create console application
            $console = new Application($this->kernel);
            $console->setAutoExit(false);

            // Prepare command with ArrayInput
            $input = new ArrayInput([
                'command' => 'cache:warmup',
            ]);

            // Create output buffer
            $output = new BufferedOutput(
                OutputInterface::VERBOSITY_DEBUG,
                true
            );

            // Execute command
            $returnCode = $console->run($input, $output);

            $executionTime = round((microtime(true) - $startTime) * 1000, 2);
            $outputContent = $output->fetch();

            if ($returnCode === 0) {
                $this->logger->info('[InternalCacheController] Cache warmup completed successfully', [
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                ]);

                return [
                    'status' => 'success',
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                    'output' => $outputContent,
                ];
            } else {
                $this->logger->warning('[InternalCacheController] Cache warmup returned non-zero exit code', [
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                    'output' => $outputContent,
                ]);

                return [
                    'status' => 'failed',
                    'execution_time_ms' => $executionTime,
                    'return_code' => $returnCode,
                    'output' => $outputContent,
                ];
            }
        } catch (\Exception $e) {
            $this->logger->error('[InternalCacheController] Cache warmup exception', [
                'error' => $e->getMessage(),
            ]);

            return [
                'status' => 'error',
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Symfonyリクエストオブジェクトからホームページリロード用のベースURLを取得
     *
     * @param Request $request 現在のリクエストオブジェクト
     *
     * @return string ベースURL（例: https://example.com）
     */
    private function getBaseUrl(Request $request): string
    {
        // Get scheme (http or https) from request
        $scheme = $request->getScheme();

        // Get host from request
        $host = $request->getHost();

        // Combine scheme and host
        $baseUrl = $scheme.'://'.$host;

        // Add port if it's not standard (80 for http, 443 for https)
        $port = $request->getPort();
        if (($scheme === 'http' && $port !== 80) || ($scheme === 'https' && $port !== 443)) {
            $baseUrl .= ':'.$port;
        }

        $this->logger->debug('[InternalCacheController] Determined base URL from request', [
            'base_url' => $baseUrl,
            'scheme' => $scheme,
            'host' => $host,
            'port' => $port,
        ]);

        return $baseUrl;
    }
}
