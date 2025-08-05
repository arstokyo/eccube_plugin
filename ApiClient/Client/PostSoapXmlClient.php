<?php

namespace Plugin\AceClient43\ApiClient\Client;

use Plugin\AceClient43\ApiClient\Response;
use Plugin\AceClient43\Exception;
use Plugin\AceClient43\Util\Extractor\XmlExtractorTrait;
use Psr\Http\Message\ResponseInterface as PsrResponse;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * PostSoapXmlClient - SOAP XML POST実装
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PostSoapXmlClient extends AbstractClient
{
    use XmlExtractorTrait;

    /**
     * Extract maximum length for logging clean content.
     *
     * @var int
     */
    private int $extractMaxLength;

    #[Required]
    public function setExtractMaxLength(
        #[Autowire('%ace_client.post_soap_client.extract_max_length%')]
        int $length,
    ): void {
        $this->extractMaxLength = $length;
    }

    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_POST;
    }

    public function getApiType(): string
    {
        return self::API_TYPE_SOAP;
    }

    public function getRequestFormat(): string
    {
        return self::FORMAT_XML;
    }

    public function supports(string $apiType, string $format): bool
    {
        return $apiType === self::API_TYPE_SOAP && $format === self::FORMAT_XML;
    }

    public function send(): Response\ResponseInterface
    {
        $options = $this->buildOptions();
        $uri = $this->buildUri();

        // Extract clean request content for logging only
        $cleanRequestContent = $this->extractCleanRequestContent($options['body'] ?? '');

        $this->logger->debug(sprintf(
            "[AceClient] SOAP リクエスト送信 - URI: '%s', メソッド: '%s', クリーンコンテンツ: %s",
            $uri ?: 'empty',
            $this->requestMethod,
            $cleanRequestContent ?: 'empty'
        ));

        // Send the FULL SOAP content to the API (not the extracted content)
        $rawResponse = $this->httpClient->request(
            $this->requestMethod,
            $uri,
            $options
        );

        return $this->deserializeResponse($rawResponse);
    }

    /**
     * Override deserializeResponse to log clean response content
     */
    protected function deserializeResponse(PsrResponse $psrResponse): Response\ResponseInterface
    {
        try {
            $body = $psrResponse->getBody();
            $contentLength = $body->getSize();

            // If size is unknown or too large, don't extract clean content
            $shouldExtractClean = $contentLength !== null && $contentLength <= $this->extractMaxLength;

            $responseContent = $body->getContents();

            $cleanResponseContent = $shouldExtractClean ? $this->extractCleanResponseContent($responseContent) : ($contentLength !== null
                ? sprintf('[Content too large: %d bytes]', $contentLength)
                : '[Content size unknown - skipping extraction]');

            $this->logger->debug(sprintf(
                '[AceClient] SOAP APIレスポンス - ステータス: %s, クリーンコンテンツ: %s',
                $psrResponse->getStatusCode(),
                $cleanResponseContent
            ));

            // Use the FULL response content for deserialization
            $response = empty($this->responseObject)
                ? $responseContent
                : $this->deserializeResponseContent($responseContent, $psrResponse);
        } catch (\Throwable $t) {
            $this->logger->error("[AceClient] SOAP エラー: {$t->getMessage()}");
            throw new Exception\CanNotBuildResponseException('レスポンスコンテンツの取得と逆シリアル化に失敗しました', $t);
        }

        return new Response\Response($psrResponse->getHeaders(), $response, $psrResponse->getStatusCode());
    }

    protected function buildOptions(): array
    {
        $baseOptions = parent::buildOptions();
        if (empty($this->request)) {
            return $baseOptions;
        }

        $request = $this->serializeRequest();

        return array_merge_recursive($baseOptions, [
            'headers' => ['Content-Type' => self::CONTENT_TYPE_SOAP_XML],
            'body' => $request,
        ]);
    }
}
