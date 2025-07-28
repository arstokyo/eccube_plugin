<?php

namespace Plugin\AceClient43\Util\Extractor;

trait XmlExtractorTrait
{
    /**
     * Extract clean request content for logging (removes SOAP envelope)
     */
    protected function extractCleanRequestContent(string $content): string
    {
        if (empty($content) || !$this->isSoapContent($content)) {
            return $content;
        }

        $innerContent = $this->extractRequestInnerContent($content);
        if ($innerContent) {
            return $this->formatXmlContent($innerContent);
        }

        return $content;
    }

    /**
     * Extract clean response content for logging (removes SOAP envelope)
     */
    protected function extractCleanResponseContent(string $content): string
    {
        if (empty($content) || !$this->isSoapContent($content)) {
            return $content;
        }

        $innerContent = $this->extractResponseInnerContent($content);
        if ($innerContent) {
            return $this->formatXmlContent($innerContent);
        }

        return $content;
    }

    /**
     * Process SOAP content to extract and format inner content (for data collectors)
     */
    protected function processSoapContent(string $content, string $contentType, string $context = 'response'): string
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
    protected function isSoapContent(string $content, ?string $contentType = null): bool
    {
        if ($contentType && strpos($contentType, 'xml') !== false) {
            return true;
        }

        return strpos($content, 'soap:') !== false
               || strpos($content, 'soap12:') !== false
               || strpos($content, '<soap') !== false
               || strpos($content, 'xmlns:soap') !== false;
    }

    /**
     * Extract inner content from SOAP request
     */
    protected function extractRequestInnerContent(string $content): ?string
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
        if (strpos($content, '<soap') === false && strpos($content, 'soap:') === false) {
            return $content;
        }

        return null;
    }

    protected function extractActualRequestContent(string $bodyContent): ?string
    {
        // Look for the actual request content inside the body
        if (preg_match('/<([^\/\s>]+)(?:[^>]*)>(.*?)<\/\1>/s', $bodyContent, $innerMatches)) {
            $rootElement = $innerMatches[1];
            // Skip soap-related elements
            if (strpos(strtolower($rootElement), 'soap') === false) {
                return trim($innerMatches[0]); // Return the full element with its content
            }
        }

        return $bodyContent;
    }

    /**
     * Extract inner content from SOAP response
     */
    protected function extractResponseInnerContent(string $content): ?string
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
    protected function formatXmlWithCdata(string $xml): string
    {
        // First, extract and format CDATA sections
        $xml = $this->processCdataContent($xml);

        // Then format the main XML
        return $this->formatXmlContent($xml);
    }

    /**
     * Process CDATA content within XML
     */
    protected function processCdataContent(string $xml): string
    {
        // Find all CDATA sections and format their inner content
        return preg_replace_callback(
            '/<!\[CDATA\[(.*?)\]\]>/s',
            function ($matches) {
                $cdataContent = $matches[1];

                // Check if CDATA contains XML
                if ($this->isXmlContent($cdataContent)) {
                    $formattedCdata = $this->formatXmlContent($cdataContent);

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
    protected function isXmlContent(string $content): bool
    {
        $trimmed = trim($content);

        return substr($trimmed, 0, 5) === '<?xml'
               || (substr($trimmed, 0, 1) === '<' && strpos($trimmed, '>') !== false && strpos($trimmed, '</') !== false);
    }

    /**
     * Format XML content beautifully
     */
    protected function formatXmlContent(string $xml): string
    {
        $xml = trim($xml);

        try {
            $dom = new \DOMDocument('1.0', 'UTF-8');
            $dom->preserveWhiteSpace = false;
            $dom->formatOutput = true;

            $xmlToLoad = $xml;
            $wasWrapped = false;

            if (substr($xml, 0, 5) !== '<?xml') {
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
    protected function basicXmlFormat(string $xml): string
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

            if (substr($line, 0, 4) === '<!--') {
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
     * Decode HTML entities in XML content for better display (especially Japanese characters)
     * This method is used for profiler display purposes only
     */
    protected function decodeXmlEntitiesForDisplay(string $content): string
    {
        // Decode numeric HTML entities (like &#x30B0; for Japanese characters)
        $content = html_entity_decode($content, ENT_QUOTES | ENT_XML1, 'UTF-8');

        // Also decode hexadecimal entities manually if html_entity_decode doesn't catch them all
        $content = preg_replace_callback('/&#x([0-9A-Fa-f]+);/', function ($matches) {
            return mb_chr(hexdec($matches[1]), 'UTF-8');
        }, $content);

        // Decode decimal entities
        return preg_replace_callback('/&#([0-9]+);/', function ($matches) {
            return mb_chr((int) $matches[1], 'UTF-8');
        }, $content);
    }

    /**
     * Extract key information from SOAP response for summary (fallback)
     */
    protected function extractSoapSummary(string $content): string
    {
        $summary = [];
        $summary[] = 'Content Length: '.strlen($content).' bytes';

        if (preg_match('/<soap\d*:Envelope[^>]*>/', $content, $matches)) {
            $summary[] = 'SOAP Envelope: '.trim($matches[0]);
        }

        if (strpos($content, 'diffgr:diffgram') !== false) {
            $summary[] = 'Contains: diffgr:diffgram data';
            if (preg_match_all('/<[^\/\s>]+\s+diffgr:id="[^"]*"/', $content, $matches)) {
                $summary[] = 'Data Rows: '.count($matches[0]);
            }
        }

        if (strpos($content, 'soap:Fault') !== false || strpos($content, 'soap12:Fault') !== false) {
            $summary[] = '⚠️ Contains SOAP Fault';
            if (preg_match('/<faultstring[^>]*>(.*?)<\/faultstring>/s', $content, $matches)) {
                $faultString = trim(strip_tags($matches[1]));
                $summary[] = 'Fault: '.(strlen($faultString) > 100 ? substr($faultString, 0, 100).'...' : $faultString);
            }
        }

        return implode("\n", $summary);
    }
}
