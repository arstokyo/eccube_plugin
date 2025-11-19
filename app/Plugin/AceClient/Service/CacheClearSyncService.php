<?php

namespace Plugin\AceClient43\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Log\LoggerInterface;

/**
 * キャッシュクリア同期サービス
 *
 * 管理サーバーからフロントサーバーへHTTP経由でキャッシュクリア操作を同期します。
 * opcache.validate_timestamps=0を使用するフロントサーバー環境向けに設計されています。
 *
 * 管理サーバー検出ロジック:
 *   1. 明示的設定: $adminHostが設定されている場合、現在のホスト名と比較
 *   2. フォールバック: ホスト名にキーワード('admin', 'adm.', 'manager')が含まれているかチェック
 */
class CacheClearSyncService
{
    private bool $enabled;
    private string $authToken;
    private array $frontServers;
    private ?string $adminHost;
    private array $adminKeywords;
    private int $timeout;
    private int $retryAttempts;
    private string $endpointPath = 'aceclient/internal/cache/clear';
    private Client $httpClient;
    private LoggerInterface $logger;

    public function __construct(
        bool $enabled,
        string $authToken,
        array $frontServers,
        ?string $adminHost,
        array $adminKeywords,
        int $timeout,
        int $retryAttempts,
        Client $httpClient,
        LoggerInterface $logger,
    ) {
        $this->enabled = $enabled;
        $this->authToken = $authToken;
        $this->frontServers = $frontServers;
        $this->adminHost = $adminHost;
        $this->adminKeywords = $adminKeywords;
        $this->timeout = $timeout;
        $this->retryAttempts = $retryAttempts;
        $this->httpClient = $httpClient;
        $this->logger = $logger;
    }

    /**
     * 設定された全てのフロントサーバーのキャッシュをクリア
     *
     * @return array 'success' (bool) と 'results' (サーバー毎の結果配列) を含む結果
     */
    public function clear(): array
    {
        // Check if sync is enabled
        if (!$this->enabled) {
            $this->logger->info('[CacheClearSync] Cache sync is disabled');

            return ['success' => true, 'message' => 'Cache sync disabled', 'results' => []];
        }

        // Check if we're on admin server
        if (!$this->isAdminServer()) {
            $this->logger->info('[CacheClearSync] Not running on admin server, skipping sync', [
                'current_host' => gethostname(),
                'admin_host' => $this->adminHost ?: 'auto-detect',
            ]);

            return ['success' => true, 'message' => 'Not admin server', 'results' => []];
        }

        // Validate configuration
        if (empty($this->authToken)) {
            $this->logger->warning('[CacheClearSync] Auth token not configured, skipping sync');

            return ['success' => false, 'message' => 'Auth token not configured', 'results' => []];
        }

        if (empty($this->frontServers)) {
            $this->logger->warning('[CacheClearSync] No front servers configured, skipping sync');

            return ['success' => false, 'message' => 'No front servers configured', 'results' => []];
        }

        $this->logger->info('[CacheClearSync] Starting cache sync to front servers', [
            'front_servers' => $this->frontServers,
            'current_host' => gethostname(),
        ]);

        $results = [];
        $overallSuccess = true;

        // Clear cache on each front server
        foreach ($this->frontServers as $frontServer) {
            $result = $this->clearFrontServer($frontServer);
            $results[$frontServer] = $result;

            if (!$result['success']) {
                $overallSuccess = false;
            }
        }

        $this->logger->info('[CacheClearSync] Cache sync completed', [
            'overall_success' => $overallSuccess,
            'results' => $results,
        ]);

        return [
            'success' => $overallSuccess,
            'message' => $overallSuccess ? 'All front servers cleared' : 'Some front servers failed',
            'results' => $results,
        ];
    }

    /**
     * リトライロジック付きで単一のフロントサーバーのキャッシュをクリア
     *
     * @param string $frontServerUrl フロントサーバーのベースURL
     *
     * @return array 'success' (bool) と 'message' (string) を含む結果
     */
    private function clearFrontServer(string $frontServerUrl): array
    {
        $url = rtrim($frontServerUrl, '/').'/'.$this->endpointPath;
        $attempt = 0;
        $lastException = null;

        while ($attempt < $this->retryAttempts) {
            $attempt++;

            try {
                $this->logger->debug('[CacheClearSync] Sending cache clear request', [
                    'url' => $url,
                    'attempt' => $attempt,
                    'max_attempts' => $this->retryAttempts,
                ]);

                $response = $this->httpClient->post($url, [
                    'headers' => [
                        'X-Cache-Sync-Token' => $this->authToken,
                        'Content-Type' => 'application/json',
                    ],
                    'json' => [
                        'source' => gethostname(),
                        'timestamp' => time(),
                    ],
                    'timeout' => $this->timeout,
                ]);

                $statusCode = $response->getStatusCode();
                $content = (string) $response->getBody();

                if ($statusCode === 200) {
                    $data = json_decode($content, true);
                    $this->logger->info('[CacheClearSync] Successfully cleared cache on front server', [
                        'url' => $url,
                        'attempt' => $attempt,
                        'response' => $data,
                    ]);

                    return [
                        'success' => true,
                        'message' => $data['message'] ?? 'Cache cleared successfully',
                        'attempt' => $attempt,
                    ];
                } else {
                    $this->logger->warning('[CacheClearSync] Front server returned non-200 status', [
                        'url' => $url,
                        'status_code' => $statusCode,
                        'response' => $content,
                        'attempt' => $attempt,
                    ]);

                    $lastException = new \RuntimeException("HTTP {$statusCode}: {$content}");
                }
            } catch (GuzzleException $e) {
                $this->logger->warning('[CacheClearSync] Guzzle error while clearing front server', [
                    'url' => $url,
                    'attempt' => $attempt,
                    'error' => $e->getMessage(),
                ]);
                $lastException = $e;
            } catch (\Exception $e) {
                $this->logger->error('[CacheClearSync] Unexpected error while clearing front server', [
                    'url' => $url,
                    'attempt' => $attempt,
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
                $lastException = $e;
            }

            // Wait before retry (exponential backoff: 1s, 2s, 4s...)
            if ($attempt < $this->retryAttempts) {
                $waitTime = pow(2, $attempt - 1);
                $this->logger->debug("[CacheClearSync] Waiting {$waitTime}s before retry");
                sleep($waitTime);
            }
        }

        // All attempts failed
        $errorMessage = $lastException ? $lastException->getMessage() : 'Unknown error';
        $this->logger->error('[CacheClearSync] Failed to clear cache on front server after all attempts', [
            'url' => $url,
            'attempts' => $this->retryAttempts,
            'last_error' => $errorMessage,
        ]);

        return [
            'success' => false,
            'message' => "Failed after {$this->retryAttempts} attempts: {$errorMessage}",
            'attempts' => $this->retryAttempts,
        ];
    }

    /**
     * 現在のサーバーが管理サーバーかどうかを判定
     *
     * 検出ロジック:
     *   1. $adminHostが設定されている場合（明示的）、現在のホスト名と比較
     *   2. そうでない場合、ホスト名に管理用キーワードが含まれているかチェック（フォールバック）
     *
     * @return bool 管理サーバーの場合はtrue
     */
    private function isAdminServer(): bool
    {
        $currentHost = gethostname();

        // Strategy 1: Explicit admin host configuration (highest priority)
        if (!empty($this->adminHost)) {
            $isAdmin = strcasecmp($currentHost, $this->adminHost) === 0;
            $this->logger->debug('[CacheClearSync] Admin detection via explicit host', [
                'current_host' => $currentHost,
                'admin_host' => $this->adminHost,
                'is_admin' => $isAdmin,
            ]);

            return $isAdmin;
        }

        // Strategy 2: Keyword-based auto-detection (fallback)
        foreach ($this->adminKeywords as $keyword) {
            if (stripos($currentHost, $keyword) !== false) {
                $this->logger->debug('[CacheClearSync] Admin detection via keyword match', [
                    'current_host' => $currentHost,
                    'matched_keyword' => $keyword,
                    'is_admin' => true,
                ]);

                return true;
            }
        }

        $this->logger->debug('[CacheClearSync] Admin detection: not admin server', [
            'current_host' => $currentHost,
            'admin_keywords' => $this->adminKeywords,
            'is_admin' => false,
        ]);

        return false;
    }

    /**
     * 現在の設定を取得（デバッグ/テスト用）
     *
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'enabled' => $this->enabled,
            'has_auth_token' => !empty($this->authToken),
            'front_servers' => $this->frontServers,
            'admin_host' => $this->adminHost,
            'admin_keywords' => $this->adminKeywords,
            'timeout' => $this->timeout,
            'retry_attempts' => $this->retryAttempts,
            'endpoint_path' => $this->endpointPath,
            'is_admin_server' => $this->isAdminServer(),
            'current_hostname' => gethostname(),
        ];
    }
}
