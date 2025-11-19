<?php

namespace Plugin\AceClient43\ApiClient\Client;

use Plugin\AceClient43\ApiClient\Response;
use Plugin\AceClient43\Exception;
use Plugin\AceClient43\Exception\CanNotBuildRequestException;
use Plugin\AceClient43\Util\Extractor\XmlExtractorTrait;
use Psr\Http\Message\ResponseInterface as PsrResponse;

/**
 * PostSoapXmlClient - オプションのキャッシュ機能付きSOAP XML POST実装
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PostSoapXmlClient extends AbstractClient implements RequestCacheableClientInterface
{
    use XmlExtractorTrait;
    use RequestCacheableClientTrait;

    /**
     * ログ出力用のクリーンコンテンツ抽出の最大長
     *
     * @var int
     */
    private int $extractMaxLength;

    /**
     * クリーンコンテンツ抽出の最大長を設定
     *
     * @param int $extractMaxLength 最大長
     *
     * @return void
     */
    public function setExtractMaxLength(int $extractMaxLength): void
    {
        $this->extractMaxLength = $extractMaxLength;
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

    public function supports(string $apiType, string $format, string $httpMethod): bool
    {
        return $apiType === self::API_TYPE_SOAP && $format === self::FORMAT_XML && $httpMethod === self::HTTP_METHOD_POST;
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
     * クリーンなレスポンスコンテンツをログ出力するためにdeserializeResponseをオーバーライド
     */
    protected function deserializeResponse(PsrResponse $psrResponse): Response\ResponseInterface
    {
        try {
            $body = $psrResponse->getBody();
            $contentLength = $body->getSize();

            $shouldExtractClean = $contentLength !== null && $contentLength <= $this->extractMaxLength;
            $responseContent = $body->getContents();

            $cleanResponseContent = $shouldExtractClean
                ? $this->extractCleanResponseContent($responseContent)
                : ($contentLength !== null
                    ? sprintf('[Content too large: %d bytes]', $contentLength)
                    : '[Content size unknown - skipping extraction]');

            $this->logger->debug(sprintf(
                '[AceClient] SOAP APIレスポンス - ステータス: %s, クリーンコンテンツ: %s',
                $psrResponse->getStatusCode(),
                $cleanResponseContent
            ));

            $response = empty($this->responseObject)
                ? $responseContent
                : $this->deserializeResponseContent($responseContent, $psrResponse);
        } catch (\Throwable $t) {
            $this->logger->error('[AceClient] SOAP エラー: {message}, {stacktrace}', [
                'message' => $t->getMessage(),
                'stacktrace' => $t->getTraceAsString(),
            ]);
            throw new Exception\CanNotBuildResponseException('レスポンスコンテンツの取得と逆シリアル化に失敗しました', $t);
        }

        return new Response\Response($psrResponse->getHeaders(), $response, $psrResponse->getStatusCode());
    }

    /**
     * @throws CanNotBuildRequestException
     */
    protected function buildOptions(): array
    {
        $baseOptions = parent::buildOptions();

        // Use caching-aware request building (from trait)
        $request = $this->getOrCreateCachedRequest();

        if (empty($request)) {
            return $baseOptions;
        }

        return array_merge_recursive($baseOptions, [
            'headers' => ['Content-Type' => self::CONTENT_TYPE_SOAP_XML],
            'body' => $request,
        ]);
    }
}
