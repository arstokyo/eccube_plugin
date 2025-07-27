<?php

namespace Plugin\AceClient43\Util\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\TransferException;
use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Util\DataCollector\ApiClientDataCollector;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Traceable Guzzle HTTP client that captures request/response details
 */
class TraceableGuzzleClient implements ClientInterface
{
    private Client $client;

    private array $tracedRequests = [];

    private ?Stopwatch $stopwatch;

    public function __construct(AceConfigService $aceConfigService, ?Stopwatch $stopwatch = null)
    {
        $this->stopwatch = $stopwatch;

        $this->client = new Client([
            'base_uri' => $aceConfigService->getBaseUri(),
            'timeout' => 600,
            'verify' => false,
            'headers' => [
                'User-Agent' => 'AceClient/4.3',
            ],
        ]);
    }

    /**
     * Register this HTTP client with the data collector
     */
    public function registerWithCollector(ApiClientDataCollector $collector): void
    {
        $collector->addHttpClient('ace_http_client', $this);
    }

    public function request(string $method, $uri = '', array $options = []): ResponseInterface
    {
        $startTime = microtime(true);
        $trace = [
            'method' => $method,
            'url' => (string) $uri,
            'options' => $options,
            'info' => [],
            'content' => '',
        ];

        if ($this->stopwatch) {
            $this->stopwatch->start('ace_http_request', 'ace_client');
        }

        try {
            $response = $this->client->request($method, $uri, $options);
            $endTime = microtime(true);

            // Capture response content
            $content = $response->getBody()->getContents();
            $response->getBody()->rewind(); // Reset stream position

            $trace['content'] = $content;
            $trace['info'] = [
                'http_code' => $response->getStatusCode(),
                'response_headers' => array_map(
                    fn ($header) => is_array($header) ? implode(', ', $header) : $header,
                    $response->getHeaders()
                ),
                'total_time' => $endTime - $startTime,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ];

            $this->tracedRequests[] = $trace;

            return $response;
        } catch (TransferException $e) {
            $endTime = microtime(true);

            $trace['info'] = [
                'http_code' => 0,
                'error' => $e->getMessage(),
                'total_time' => $endTime - $startTime,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ];

            $this->tracedRequests[] = $trace;
            throw $e;
        } finally {
            if ($this->stopwatch) {
                $this->stopwatch->stop('ace_http_request');
            }
        }
    }

    public function getTracedRequests(): array
    {
        return $this->tracedRequests;
    }

    public function reset(): void
    {
        $this->tracedRequests = [];
    }

    // Implement other ClientInterface methods by delegating to the wrapped client
    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->client->send($request, $options);
    }

    public function sendAsync(RequestInterface $request, array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        return $this->client->sendAsync($request, $options);
    }

    public function requestAsync(string $method, $uri = '', array $options = []): \GuzzleHttp\Promise\PromiseInterface
    {
        return $this->client->requestAsync($method, $uri, $options);
    }

    public function getConfig(?string $option = null)
    {
        return $this->client->getConfig($option);
    }
}
