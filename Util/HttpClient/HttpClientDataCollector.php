<?php

namespace Plugin\AceClient43\Util\HttpClient;

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

    /**
     * Process SOAP content to extract and format inner content
     * Keeps all existing SOAP processing logic
     */
    private function processSoapContent(string $content, string $contentType, string $context = 'response'): string
    {
        // Check if this is SOAP content
        if (!$this->isSoapContent($content, $contentType)) {
            return $content;
        }

        // For request context, try to extract inner content from SOAP envelope
        if ($context === 'request') {
            $innerContent = $this->extractRequestInnerContent($content);
        } else {
            // For response context, extract response inner content
            $innerContent = $this->extractResponseInnerContent($content);
        }

        if ($innerContent) {
            $formattedInner = $this->formatXmlWithCdata($innerContent);

            return '/* ACE SOAP '.ucfirst($context)." Content */\n".$formattedInner;
        }

        // Fallback to summary if inner content extraction fails
        $summary = $this->extractSoapSummary($content);

        return '/* ACE SOAP '.ucfirst($context)." Summary */\n".$summary;
    }

    /**
     * Check if content is SOAP XML
     */
    private function isSoapContent(string $content, string $contentType): bool
    {
        return
            str_contains($contentType, 'xml')
            || str_contains($content, 'soap:')
            || str_contains($content, 'soap12:')
            || str_contains($content, '<soap')
            || str_contains($content, 'xmlns:soap')
        ;
    }

    /**
     * Extract inner content from SOAP request - Enhanced to remove SOAP envelope
     */
    private function extractRequestInnerContent(string $content): ?string
    {
        // First, try to extract soap:Body content
        if (preg_match('/<soap12?:Body[^>]*>(.*?)<\/soap12?:Body>/s', $content, $matches)) {
            $bodyContent = trim($matches[1]);

            return $this->extractActualRequestContent($bodyContent);
        }

        // Try generic body extraction
        if (preg_match('/<Body[^>]*>(.*?)<\/Body>/s', $content, $matches)) {
            $bodyContent = trim($matches[1]);

            return $this->extractActualRequestContent($bodyContent);
        }

        // If no SOAP envelope found, check if it's already clean content
        if (!str_contains($content, '<soap') && !str_contains($content, 'soap:')) {
            return $content;
        }

        return null;
    }

    private function extractActualRequestContent(string $bodyContent): ?string
    {
        // Look for the actual request content inside the body
        if (preg_match('/<([^\/\s>]+)(?:[^>]*)>(.*?)<\/\1>/s', $bodyContent, $innerMatches)) {
            $rootElement = $innerMatches[1];
            // Skip soap-related elements
            if (!str_contains(strtolower($rootElement), 'soap')) {
                return trim($innerMatches[0]); // Return the full element with its content
            }
        }

        return $bodyContent;
    }

    /**
     * Extract inner content from SOAP response
     */
    private function extractResponseInnerContent(string $content): ?string
    {
        // Try to extract diffgr:diffgram content (most common in ACE responses)
        if (preg_match('/<diffgr:diffgram[^>]*>(.*?)<\/diffgr:diffgram>/s', $content, $matches)) {
            return trim($matches[1]);
        }

        // Try to extract soap:Body content
        if (preg_match('/<soap12?:Body[^>]*>(.*?)<\/soap12?:Body>/s', $content, $matches)) {
            $bodyContent = trim($matches[1]);

            // If body contains a response method, extract that
            if (preg_match('/<(\w+Response)[^>]*>(.*?)<\/\1>/s', $bodyContent, $responseMatches)) {
                return trim($responseMatches[2]);
            }

            return $bodyContent;
        }

        // Try generic body extraction
        if (preg_match('/<Body[^>]*>(.*?)<\/Body>/s', $content, $matches)) {
            return trim($matches[1]);
        }

        return null;
    }

    /**
     * Format XML content beautifully with CDATA handling
     */
    private function formatXmlWithCdata(string $xml): string
    {
        // First, extract and format CDATA sections
        $xml = $this->processCdataContent($xml);

        // Then format the main XML
        return $this->formatXml($xml);
    }

    /**
     * Process CDATA content within XML
     */
    private function processCdataContent(string $xml): string
    {
        // Find all CDATA sections and format their inner content
        return preg_replace_callback(
            '/<!\[CDATA\[(.*?)\]\]>/s',
            function ($matches) {
                $cdataContent = $matches[1];

                // Check if CDATA contains XML
                if ($this->isXmlContent($cdataContent)) {
                    $formattedCdata = $this->formatXml($cdataContent);

                    // Keep CDATA wrapper but with formatted inner content
                    return "<![CDATA[\n".$formattedCdata."\n]]>";
                }

                // If not XML, return original CDATA but with better formatting
                return "<![CDATA[\n".trim($cdataContent)."\n]]>";
            },
            $xml
        );
    }

    /**
     * Check if content looks like XML
     */
    private function isXmlContent(string $content): bool
    {
        $trimmed = trim($content);

        return
            str_starts_with($trimmed, '<?xml')
            || (str_starts_with($trimmed, '<') && str_contains($trimmed, '>') && str_contains($trimmed, '</'))
        ;
    }

    /**
     * Format XML content beautifully
     */
    private function formatXml(string $xml): string
    {
        $xml = trim($xml);

        try {
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            $xmlToLoad = $xml;
            $wasWrapped = false;

            if (!str_starts_with($xml, '<?xml')) {
                $xmlToLoad = '<?xml version="1.0" encoding="UTF-8"?><root>'.$xml.'</root>';
                $wasWrapped = true;
            }

            libxml_use_internal_errors(true);
            $loaded = $dom->loadXML($xmlToLoad);
            libxml_clear_errors();

            if ($loaded) {
                $formatted = $dom->saveXML();
                $formatted = preg_replace('/^<\?xml[^>]*>\s*/', '', $formatted);

                if ($wasWrapped) {
                    $formatted = preg_replace('/^\s*<root>\s*/s', '', $formatted);
                    $formatted = preg_replace('/\s*<\/root>\s*$/s', '', $formatted);
                }

                return trim($formatted);
            }
        } catch (\Exception $e) {
            // If DOM parsing fails, fall back to basic formatting
        }

        return $this->basicXmlFormat($xml);
    }

    /**
     * Enhanced basic XML formatting as fallback
     */
    private function basicXmlFormat(string $xml): string
    {
        $xml = preg_replace('/>\s+</', '><', trim($xml));
        $xml = preg_replace('/>([^<\s][^<]*)</s', ">\n$1\n<", $xml);
        $xml = preg_replace('/></s', ">\n<", $xml);

        $lines = explode("\n", $xml);
        $formatted = [];
        $indent = 0;
        $indentStr = '  ';

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }

            if (str_starts_with($line, '<!--')) {
                $formatted[] = str_repeat($indentStr, $indent).$line;
                continue;
            }

            if (preg_match('/^<\//', $line)) {
                $indent = max(0, $indent - 1);
            }

            $formatted[] = str_repeat($indentStr, $indent).$line;

            if (preg_match('/^<[^\/][^>]*[^\/]>/', $line)) {
                $indent++;
            }
        }

        return implode("\n", $formatted);
    }

    /**
     * Extract key information from SOAP response for summary (fallback)
     */
    private function extractSoapSummary(string $content): string
    {
        $summary = [];
        $summary[] = 'Content Length: '.strlen($content).' bytes';

        if (preg_match('/<soap\d*:Envelope[^>]*>/', $content, $matches)) {
            $summary[] = 'SOAP Envelope: '.trim($matches[0]);
        }

        if (str_contains($content, 'diffgr:diffgram')) {
            $summary[] = 'Contains: diffgr:diffgram data';
            if (preg_match_all('/<[^\/\s>]+\s+diffgr:id="[^"]*"/', $content, $matches)) {
                $summary[] = 'Data Rows: '.count($matches[0]);
            }
        }

        if (str_contains($content, 'soap:Fault') || str_contains($content, 'soap12:Fault')) {
            $summary[] = '⚠️ Contains SOAP Fault';
            if (preg_match('/<faultstring[^>]*>(.*?)<\/faultstring>/s', $content, $matches)) {
                $faultString = trim(strip_tags($matches[1]));
                $summary[] = 'Fault: '.(strlen($faultString) > 100 ? substr($faultString, 0, 100).'...' : $faultString);
            }
        }

        return implode("\n", $summary);
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
