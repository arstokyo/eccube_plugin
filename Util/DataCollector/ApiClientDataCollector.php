<?php

namespace Plugin\AceClient43\Util\DataCollector;

use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Util\Extractor\XmlExtractorTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpKernel\DataCollector\LateDataCollectorInterface;

/**
 * Data collector that stores raw objects using custom dumper for better nested visualization
 */
class ApiClientDataCollector extends DataCollector implements LateDataCollectorInterface
{
    use XmlExtractorTrait;

    private array $traceableClients = [];

    private AceConfigService $aceConfigService;

    private DataDumper $dataDumper;

    private bool $collecting = false;

    private bool $dataCollected = false;

    public function __construct(AceConfigService $aceConfigService, DataDumper $dataDumper)
    {
        $this->aceConfigService = $aceConfigService;
        $this->dataDumper = $dataDumper;
        $this->reset();
    }

    public function addClient(string $name, TraceableApiClientInterface $client): void
    {
        $this->traceableClients[$name] = $client;
    }

    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
    {
        if ($this->isProfilerRequest($request)) {
            return;
        }

        if (!isset($this->data['clients'])) {
            $this->data['clients'] = [];
            $this->data['request_count'] = 0;
            $this->data['error_count'] = 0;
        }
    }

    public function lateCollect(): void
    {
        if ($this->collecting || $this->dataCollected) {
            return;
        }

        $this->collecting = true;

        try {
            $collectedData = [];
            $totalRequestCount = 0;
            $totalErrorCount = 0;

            foreach ($this->traceableClients as $name => $client) {
                try {
                    $traces = $client->getTracedRequests();
                    $filteredTraces = $this->filterProfilerTraces($traces);

                    if (empty($filteredTraces)) {
                        continue;
                    }

                    $errorCount = 0;
                    $processedTraces = [];

                    foreach ($filteredTraces as $index => $trace) {
                        try {
                            $processedTrace = $this->processTraceComplete($trace, $client, $name, $index);
                            $processedTraces[] = $processedTrace;

                            if (($processedTrace['status_code'] ?? 0) >= 400) {
                                $errorCount++;
                            }
                        } catch (\Throwable $e) {
                            $processedTraces[] = $this->createErrorTrace($trace, $e);
                            $errorCount++;
                        }
                    }

                    $collectedData[$name] = [
                        'traces' => $processedTraces,
                        'error_count' => $errorCount,
                    ];

                    $totalRequestCount += count($processedTraces);
                    $totalErrorCount += $errorCount;
                } catch (\Throwable $e) {
                    error_log("ACE API Data Collector failed for client {$name}: ".$e->getMessage());
                    $collectedData[$name] = [
                        'traces' => [],
                        'error_count' => 0,
                    ];
                }
            }

            $this->data['clients'] = $collectedData;
            $this->data['request_count'] = $totalRequestCount;
            $this->data['error_count'] = $totalErrorCount;
            $this->dataCollected = true;
        } finally {
            $this->collecting = false;
        }
    }

    private function processTraceComplete(array $trace, TraceableApiClientInterface $client, string $clientName, int $index): array
    {
        $statusCode = $this->extractStatusCode($trace);
        $baseUrl = $this->aceConfigService->getBaseUri();
        $fullUrl = $this->buildFullUrl($baseUrl, $trace['endpoint'] ?? $trace['uri'] ?? '');

        $processedTrace = [
            'method' => (string) ($trace['method'] ?? 'UNKNOWN'),
            'uri' => (string) ($trace['uri'] ?? 'unknown'),
            'full_url' => $fullUrl,
            'status_code' => $statusCode,
            'request_format' => (string) ($trace['request_format'] ?? 'xml'),
            'response_format' => (string) ($trace['response_format'] ?? 'xml'),
            'metadata' => $trace['metadata'] ?? [],
            'timing' => $trace['timing'] ?? [],
            'error' => $trace['error'] ?? null,
            'response' => $trace['response'] ?? ['status_code' => $statusCode, 'headers' => []],
        ];

        // Store raw request data using custom dumper that handles nested structures properly
        if (isset($trace['request_data'])) {
            $processedTrace['before_serialize_data_html'] = $this->dataDumper->dumpToHtml($trace['request_data']);
            $processedTrace['before_serialize_data_available'] = true;
        } else {
            $processedTrace['before_serialize_data_html'] = '';
            $processedTrace['before_serialize_data_available'] = false;
        }

        // Store raw response data using custom dumper that handles nested structures properly
        if (isset($trace['denormalized_response'])) {
            $processedTrace['deserialized_data_html'] = $this->dataDumper->dumpToHtml($trace['denormalized_response']);
            $processedTrace['deserialized_data_available'] = true;
        } else {
            $processedTrace['deserialized_data_html'] = '';
            $processedTrace['deserialized_data_available'] = false;
        }

        // Add raw HTTP data with proper XML formatting
        $this->addRawHttpDataFromTrace($processedTrace, $trace);

        return $processedTrace;
    }

    private function addRawHttpDataFromTrace(array &$processedTrace, array $trace): void
    {
        if (isset($trace['raw_http_data']) && is_array($trace['raw_http_data'])) {
            $httpData = $trace['raw_http_data'];

            // Raw Request Data with XML formatting
            $processedTrace['raw_request_data'] = $httpData['request']['body'] ?? '';
            $processedTrace['raw_request_data_formatted'] = $this->formatXmlContent(
                $httpData['request']['body_formatted'] ?? $httpData['request']['body'] ?? '(No request body)'
            );

            // Raw Response Data with XML formatting
            $processedTrace['raw_response_data'] = $httpData['response']['content'] ?? '';
            $processedTrace['raw_response_data_formatted'] = $this->formatXmlContent(
                $httpData['response']['content_formatted'] ?? $httpData['response']['content'] ?? '(No response content)'
            );

            // HTTP specific info
            $processedTrace['http_method'] = $httpData['request']['method'] ?? '';
            $processedTrace['http_url'] = $httpData['request']['url'] ?? '';
            $processedTrace['http_request_headers'] = $httpData['request']['headers'] ?? [];
            $processedTrace['http_response_headers'] = $httpData['response']['headers'] ?? [];
            $processedTrace['http_status_code'] = $httpData['response']['status_code'] ?? 0;
            $processedTrace['http_timing'] = $httpData['timing'] ?? [];
        } else {
            // Fallback when raw HTTP data is not available
            $processedTrace['raw_request_data'] = '';
            $processedTrace['raw_request_data_formatted'] = '(Raw HTTP data not available)';
            $processedTrace['raw_response_data'] = '';
            $processedTrace['raw_response_data_formatted'] = '(Raw HTTP data not available)';
        }
    }

    private function createErrorTrace(array $trace, \Throwable $e): array
    {
        return [
            'method' => $trace['method'] ?? 'ERROR',
            'uri' => $trace['uri'] ?? 'unknown',
            'full_url' => 'Processing failed: '.$e->getMessage(),
            'status_code' => 0,
            'error' => [
                'message' => 'Trace processing error: '.$e->getMessage(),
                'type' => get_class($e),
            ],
            'metadata' => [],
            'timing' => [],
            'request_format' => 'error',
            'response_format' => 'error',
            'response' => ['status_code' => 0, 'headers' => []],
            'raw_request_data' => '',
            'raw_request_data_formatted' => 'Error processing request data',
            'raw_response_data' => '',
            'raw_response_data_formatted' => 'Error processing response data',
            'before_serialize_data_html' => '',
            'before_serialize_data_available' => false,
            'deserialized_data_html' => '',
            'deserialized_data_available' => false,
        ];
    }

    private function isProfilerRequest(Request $request): bool
    {
        $uri = $request->getRequestUri();
        $pathInfo = $request->getPathInfo();

        $profilerPatterns = [
            '/_profiler', '/_wdt', '/app_dev.php/_profiler', '/app_dev.php/_wdt',
            '/debug', '/_fragment',
        ];

        foreach ($profilerPatterns as $pattern) {
            if (str_contains($uri, $pattern) || str_contains($pathInfo, $pattern)) {
                return true;
            }
        }

        if ($request->isXmlHttpRequest()) {
            $referer = $request->headers->get('Referer', '');
            foreach ($profilerPatterns as $pattern) {
                if (str_contains($referer, $pattern)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function filterProfilerTraces(array $traces): array
    {
        return array_filter($traces, function ($trace) {
            $uri = $trace['uri'] ?? '';
            $endpoint = $trace['endpoint'] ?? '';

            $profilerIndicators = ['/_profiler', '/_wdt', '/debug', '_fragment', 'profiler', 'toolbar'];

            foreach ($profilerIndicators as $indicator) {
                if (str_contains($uri, $indicator) || str_contains($endpoint, $indicator)) {
                    return false;
                }
            }

            return true;
        });
    }

    private function buildFullUrl(string $baseUrl, string $endpoint): string
    {
        $baseUrl = rtrim($baseUrl, '/');
        $endpoint = ltrim($endpoint, '/');

        return $endpoint ? "$baseUrl/$endpoint" : $baseUrl;
    }

    private function extractStatusCode(array $trace): int
    {
        if (isset($trace['response']['status_code'])) {
            return (int) $trace['response']['status_code'];
        }
        if (isset($trace['status_code'])) {
            return (int) $trace['status_code'];
        }

        return 0;
    }

    public function getClients(): array
    {
        return $this->data['clients'] ?? [];
    }

    public function getRequestCount(): int
    {
        return $this->data['request_count'] ?? 0;
    }

    public function getErrorCount(): int
    {
        return $this->data['error_count'] ?? 0;
    }

    public function getName(): string
    {
        return 'ace_api_client';
    }

    public function reset(): void
    {
        $this->data = [
            'clients' => [],
            'request_count' => 0,
            'error_count' => 0,
        ];
        $this->dataCollected = false;
    }
}
