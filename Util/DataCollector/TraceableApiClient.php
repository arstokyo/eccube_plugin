<?php

namespace Plugin\AceClient43\Util\DataCollector;

use Plugin\AceClient43\ApiClient\Client\ApiTypeSupportInterface;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;
use Plugin\AceClient43\ApiClient\Client\ClientMetadataInterface;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\Util\HttpClient\TraceableGuzzleClient;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Simplified traceable decorator for API clients
 */
class TraceableApiClient implements ClientInterface, ApiTypeSupportInterface, TraceableApiClientInterface
{
    private ClientInterface $client;

    private ?Stopwatch $stopwatch;

    private \ArrayObject $tracedRequests;

    private ?TraceableGuzzleClient $httpClient = null;

    public function __construct(
        ClientInterface $client,
        ?Stopwatch $stopwatch = null,
        ?ApiClientDataCollector $collector = null,
        string $collectorName = 'default',
    ) {
        $this->client = $client;
        $this->stopwatch = $stopwatch;
        $this->tracedRequests = new \ArrayObject();

        // Try to access the HTTP client for low-level tracing
        if (method_exists($client, 'getHttpClient')) {
            $httpClient = $client->getHttpClient();
            if ($httpClient instanceof TraceableGuzzleClient) {
                $this->httpClient = $httpClient;
            }
        }

        // Register with collector if provided
        if ($collector) {
            $collector->addClient($collectorName, $this);
        }
    }

    public function getMetadata(): ClientMetadataInterface
    {
        return $this->client->getMetadata();
    }

    public function withHeaders(array $headers): ClientInterface
    {
        $this->client->withHeaders($headers);

        return $this;
    }

    public function withEndpoint(string $endpoint): ClientInterface
    {
        $this->client->withEndpoint($endpoint);

        return $this;
    }

    public function withRequest($request): ClientInterface
    {
        $this->client->withRequest($request);

        return $this;
    }

    public function withResponseAs(string $object): ClientInterface
    {
        $this->client->withResponseAs($object);

        return $this;
    }

    public function send(): ResponseInterface
    {
        $metadata = $this->client->getMetadata();

        // Initialize trace data structure
        $traceData = [
            'method' => $metadata->getRequestMethod(),
            'uri' => $metadata->getUri(),
            'endpoint' => $metadata->getUri(),
            'request_data' => $metadata->getData(), // Capture request data BEFORE serialization
            'denormalized_response' => null, // Will be filled after response
            'request_format' => $this->getClientRequestFormat(),
            'response_format' => $this->getClientRequestFormat(),
            'response' => [
                'status_code' => 0,
                'headers' => [],
            ],
            'metadata' => [
                'method' => $metadata->getRequestMethod(),
                'uri' => $metadata->getUri(),
                'api_type' => $this->getClientApiType(),
            ],
            'timing' => null,
            'error' => null,
            'raw_http_data' => null,
        ];

        $startTime = microtime(true);
        $response = null;
        $stopwatchName = null;

        if ($this->stopwatch) {
            $stopwatchName = sprintf('%s %s', $metadata->getRequestMethod(), $metadata->getUri());
            $this->stopwatch->start($stopwatchName, 'ace_api_client');
        }

        try {
            // Clear HTTP client traces before making request to isolate this request's traces
            if ($this->httpClient) {
                $this->httpClient->reset();
            }

            // Execute the actual request
            $response = $this->client->send();

            $endTime = microtime(true);

            // Capture timing
            $traceData['timing'] = [
                'total_time' => $endTime - $startTime,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ];

            // Capture response data if we have a valid response
            if ($response !== null) {
                // Get deserialized response data
                if (method_exists($response, 'getResponse')) {
                    $traceData['denormalized_response'] = $response->getResponse();
                }

                // Get response status and headers if available
                if (method_exists($response, 'getStatusCode')) {
                    $traceData['response']['status_code'] = $response->getStatusCode();
                }

                if (method_exists($response, 'getHeaders')) {
                    $traceData['response']['headers'] = $response->getHeaders();
                }
            }

            // Capture raw HTTP data from TraceableGuzzleClient
            $traceData['raw_http_data'] = $this->captureRawHttpData();
        } catch (\Throwable $e) {
            $endTime = microtime(true);

            $traceData['timing'] = [
                'total_time' => $endTime - $startTime,
                'start_time' => $startTime,
                'end_time' => $endTime,
            ];

            $traceData['error'] = [
                'message' => $e->getMessage(),
                'type' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];

            $traceData['response'] = [
                'status_code' => 500,
                'headers' => [],
            ];

            // Still try to capture HTTP data even on error
            $traceData['raw_http_data'] = $this->captureRawHttpData();

            throw $e;
        } finally {
            // Add the completed trace data to the collection
            $this->tracedRequests[] = $traceData;

            if ($this->stopwatch && $stopwatchName) {
                $this->stopwatch->stop($stopwatchName);
            }
        }

        return $response;
    }

    /**
     * Capture raw HTTP data from the HTTP client - simplified approach
     */
    private function captureRawHttpData(): ?array
    {
        if (!$this->httpClient) {
            return null;
        }

        $httpTraces = $this->httpClient->getTracedRequests();

        // Since we reset before each request, there should be exactly one trace
        if (empty($httpTraces)) {
            return null;
        }

        // Get the most recent HTTP trace (should be the only one after reset)
        $httpTrace = end($httpTraces);

        if (!$httpTrace) {
            return null;
        }

        return [
            'request' => [
                'method' => $httpTrace['method'] ?? '',
                'url' => $httpTrace['url'] ?? '',
                'headers' => $httpTrace['options']['headers'] ?? [],
                'body' => $httpTrace['options']['body'] ?? '',
                'body_formatted' => $this->formatHttpContent(
                    $httpTrace['options']['body'] ?? '',
                    $this->getClientRequestFormat(),
                    'request'
                ),
            ],
            'response' => [
                'status_code' => $httpTrace['info']['http_code'] ?? 0,
                'headers' => $httpTrace['info']['response_headers'] ?? [],
                'content' => $httpTrace['content'] ?? '',
                'content_formatted' => $this->formatHttpContent(
                    $httpTrace['content'] ?? '',
                    $this->getClientRequestFormat(),
                    'response'
                ),
            ],
            'timing' => [
                'total_time' => $httpTrace['info']['total_time'] ?? 0,
                'namelookup_time' => $httpTrace['info']['namelookup_time'] ?? 0,
                'connect_time' => $httpTrace['info']['connect_time'] ?? 0,
                'pretransfer_time' => $httpTrace['info']['pretransfer_time'] ?? 0,
                'starttransfer_time' => $httpTrace['info']['starttransfer_time'] ?? 0,
            ],
        ];
    }

    /**
     * Format HTTP content for better display in profiler
     */
    private function formatHttpContent(string $content, string $format, string $context): string
    {
        if (empty($content)) {
            return '(Empty content)';
        }

        try {
            switch (strtolower($format)) {
                case 'xml':
                    return $this->formatXmlContent($content, $context);
                case 'json':
                    return $this->formatJsonContent($content);
                default:
                    return $content;
            }
        } catch (\Throwable $e) {
            return $content;
        }
    }

    private function formatXmlContent(string $content, string $context): string
    {
        // Check if this is SOAP content
        if ($this->isSoapContent($content)) {
            // For request context, try to extract inner content from SOAP envelope
            if ($context === 'request') {
                $innerContent = $this->extractRequestInnerContent($content);
            } else {
                // For response context, extract response inner content
                $innerContent = $this->extractResponseInnerContent($content);
            }

            if ($innerContent) {
                $formattedInner = $this->beautifyXml($innerContent);

                return '/* ACE SOAP '.ucfirst($context)." Content */\n".$formattedInner;
            }
        }

        return $this->beautifyXml($content);
    }

    private function formatJsonContent(string $content): string
    {
        try {
            $data = json_decode($content, true, 512, JSON_THROW_ON_ERROR);

            return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (\JsonException $e) {
            return $content;
        }
    }

    private function beautifyXml(string $xml): string
    {
        try {
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->formatOutput = true;
            $dom->preserveWhiteSpace = false;

            if (@$dom->loadXML($xml)) {
                return $dom->saveXML();
            }
        } catch (\Throwable $e) {
            // Fall back to original content
        }

        return $xml;
    }

    private function isSoapContent(string $content): bool
    {
        return str_contains($content, 'soap:')
               || str_contains($content, 'soap12:')
               || str_contains($content, '<soap')
               || str_contains($content, 'xmlns:soap');
    }

    private function extractRequestInnerContent(string $content): ?string
    {
        if (preg_match('/<soap12?:Body[^>]*>(.*?)<\/soap12?:Body>/s', $content, $matches)) {
            $bodyContent = trim($matches[1]);
            if (preg_match('/<([^\/\s>]+)(?:[^>]*)>(.*?)<\/\1>/s', $bodyContent, $innerMatches)) {
                $rootElement = $innerMatches[1];
                if (!str_contains(strtolower($rootElement), 'soap')) {
                    return trim($innerMatches[0]);
                }
            }

            return $bodyContent;
        }

        return null;
    }

    private function extractResponseInnerContent(string $content): ?string
    {
        // Try to extract diffgram content first
        if (preg_match('/<diffgr:diffgram[^>]*>(.*?)<\/diffgr:diffgram>/s', $content, $matches)) {
            return trim($matches[1]);
        }

        // Fallback to SOAP body content
        if (preg_match('/<soap12?:Body[^>]*>(.*?)<\/soap12?:Body>/s', $content, $matches)) {
            $bodyContent = trim($matches[1]);
            if (preg_match('/<(\w+Response)[^>]*>(.*?)<\/\1>/s', $bodyContent, $responseMatches)) {
                return trim($responseMatches[2]);
            }

            return $bodyContent;
        }

        return null;
    }

    public function getTracedRequests(): array
    {
        return $this->tracedRequests->getArrayCopy();
    }

    public function reset(): void
    {
        $this->tracedRequests->exchangeArray([]);
    }

    public function getHttpMethod(): string
    {
        return $this->client->getHttpMethod();
    }

    public function getApiType(): string
    {
        return $this->client->getApiType();
    }

    public function getRequestFormat(): string
    {
        return $this->client->getRequestFormat();
    }

    public function getHttpClient(): \GuzzleHttp\ClientInterface
    {
        return $this->client->getHttpClient();
    }

    private function getClientApiType(): string
    {
        if ($this->client instanceof ApiTypeSupportInterface) {
            return $this->client->getApiType();
        }

        return 'unknown';
    }

    private function getClientRequestFormat(): string
    {
        if ($this->client instanceof ApiTypeSupportInterface) {
            return $this->client->getRequestFormat();
        }

        return 'unknown';
    }

    public function supports(string $apiType, string $format): bool
    {
        if ($this->client instanceof ApiTypeSupportInterface) {
            return $this->client->supports($apiType, $format);
        }

        return false;
    }
}
