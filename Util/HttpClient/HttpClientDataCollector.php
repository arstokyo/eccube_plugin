<?php

namespace Plugin\AceClient43\Util\HttpClient;

use Plugin\AceClient43\Util\Extractor\XmlExtractorTrait;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpKernel\DataCollector\LateDataCollectorInterface;
use Symfony\Component\VarDumper\Caster\ImgStub;

/**
 * Data collector for ACE HTTP client with SOAP processing
 * Keeps all existing logic from AceHttpClientDataCollector
 */
class HttpClientDataCollector extends DataCollector implements LateDataCollectorInterface
{
    use XmlExtractorTrait;

    private TraceableGuzzleClient $httpClient;

    public function __construct(TraceableGuzzleClient $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->reset();
    }

    public function collect(Request $request, Response $response, ?\Throwable $exception = null): void
    {
        $this->lateCollect();
    }

    public function lateCollect(): void
    {
        $this->data['request_count'] = $this->data['request_count'] ?? 0;
        $this->data['error_count'] = $this->data['error_count'] ?? 0;
        $this->data += ['clients' => []];

        $this->doCollect('ace_client', $this->httpClient);
    }

    private function doCollect(string $name, TraceableGuzzleClient $client): void
    {
        [$errorCount, $traces] = $this->collectOnClient($client);

        $this->data['clients'] += [
            $name => [
                'traces' => [],
                'error_count' => 0,
            ],
        ];

        $this->data['clients'][$name]['traces'] = array_merge($this->data['clients'][$name]['traces'], $traces);
        $this->data['request_count'] += \count($traces);
        $this->data['error_count'] += $errorCount;
        $this->data['clients'][$name]['error_count'] += $errorCount;

        $client->reset();
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
        return 'ace_http_client';
    }

    public function reset(): void
    {
        $this->data = [
            'clients' => [],
            'request_count' => 0,
            'error_count' => 0,
        ];
    }

    private function collectOnClient(TraceableGuzzleClient $client): array
    {
        $traces = $client->getTracedRequests();
        $errorCount = 0;
        $baseInfo = [
            'response_headers' => 1,
            'retry_count' => 1,
            'redirect_count' => 1,
            'redirect_url' => 1,
            'user_data' => 1,
            'error' => 1,
            'url' => 1,
        ];

        foreach ($traces as $i => $trace) {
            if (400 <= ($trace['info']['http_code'] ?? 0)) {
                ++$errorCount;
            }

            $info = $trace['info'];
            $traces[$i]['http_code'] = $info['http_code'] ?? 0;

            unset($info['filetime'], $info['http_code'], $info['ssl_verify_result'], $info['content_type']);

            if (($info['http_method'] ?? null) === $trace['method']) {
                unset($info['http_method']);
            }

            if (($info['url'] ?? null) === $trace['url']) {
                unset($info['url']);
            }

            foreach ($info as $k => $v) {
                if (!$v || (is_numeric($v) && 0 > $v)) {
                    unset($info[$k]);
                }
            }

            // Process request body if present
            $requestBody = null;
            if (isset($trace['options']['body']) && is_string($trace['options']['body'])) {
                $requestBody = $this->processSoapContent($trace['options']['body'], 'application/xml', 'request');
            }

            if (\is_string($content = $trace['content'])) {
                $contentType = 'application/octet-stream';

                foreach ($info['response_headers'] ?? [] as $h) {
                    if (0 === stripos($h, 'content-type: ')) {
                        $contentType = substr($h, \strlen('content-type: '));
                        break;
                    }
                }

                if (str_starts_with($contentType, 'image/') && class_exists(ImgStub::class)) {
                    $content = new ImgStub($content, $contentType, '');
                } else {
                    // Process SOAP content for profiler display
                    $processedContent = $this->processSoapContent($content, $contentType, 'response');
                    $content = $processedContent;
                }

                $content = ['response_content' => $content];
            } elseif (\is_array($content)) {
                $content = ['response_json' => $content];
            } else {
                $content = [];
            }

            // Add processed request body if available
            if ($requestBody !== null) {
                $content['request_body'] = $requestBody;
            }

            if (isset($info['retry_count'])) {
                $content['retries'] = $info['previous_info'];
                unset($info['previous_info']);
            }

            $debugInfo = array_diff_key($info, $baseInfo);
            $responseInfo = array_diff_key($info, $debugInfo);

            // Create separate sections for better template handling
            $infoStructure = [
                'debug_info' => $debugInfo,
                'response_info' => $responseInfo,
            ];

            $finalInfo = $infoStructure + $content;

            unset($traces[$i]['info']); // break PHP reference used by TraceableHttpClient
            $traces[$i]['info'] = $this->cloneVar($finalInfo);
            $traces[$i]['options'] = $this->cloneVar($trace['options']);
            $traces[$i]['curlCommand'] = $this->getCurlCommand($trace);
        }

        return [$errorCount, $traces];
    }

    private function getCurlCommand(array $trace): ?string
    {
        if (!isset($trace['info']['debug'])) {
            return null;
        }

        $url = $trace['info']['original_url'] ?? $trace['info']['url'] ?? $trace['url'];
        $command = ['curl', '--compressed'];

        if (isset($trace['options']['resolve'])) {
            foreach ($trace['options']['resolve'] as $resolve) {
                $command[] = '--resolve';
                $command[] = $resolve;
            }
        }

        if (isset($trace['options']['headers'])) {
            foreach ($trace['options']['headers'] as $name => $value) {
                $command[] = '-H';
                $command[] = $name.': '.$value;
            }
        }

        if (isset($trace['options']['body'])) {
            $command[] = '-d';
            $command[] = $trace['options']['body'];
        }

        $command[] = '-X';
        $command[] = $trace['method'];
        $command[] = $url;

        return implode(' ', array_map('escapeshellarg', $command));
    }
}
