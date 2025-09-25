<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\ApiClient\Client;

use GuzzleHttp\ClientInterface as HttpClientInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\ApiClient\Response;
use Plugin\AceClient43\Exception;
use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Util\Serializer\SerializerResolver;
use Psr\Http\Message\ResponseInterface as PsrResponse;
use Psr\Log\LoggerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * 抽象クライアント - 簡素化版
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class AbstractClient implements ClientInterface, ApiTypeSupportInterface
{
    /** @var string リクエストメソッド */
    protected string $requestMethod;

    /** @var array<string, string[]> ヘッダー */
    protected array $headers = [];

    /** @var \JsonSerializable|RequestModelInterface|array<mixed, mixed>|string リクエスト */
    protected $request = [];

    /** @var string|null レスポンスオブジェクト */
    protected ?string $responseObject = null;

    /** @var string エンドポイント */
    protected string $endpoint = '';

    /** @var SerializerResolver シリアライザリゾルバー */
    protected SerializerResolver $serializerResolver;

    /** @var HttpClientInterface HTTPクライアント */
    protected HttpClientInterface $httpClient;

    /** @var LoggerInterface ロガー */
    protected LoggerInterface $logger;

    /** @var NormalizerInterface ノーマライザー */
    protected NormalizerInterface $normalizer;

    /** @var AceConfigService 設定サービス */
    protected AceConfigService $aceConfigService;

    /**
     * 抽象クライアントコンストラクタ
     *
     * @param SerializerResolver $serializerResolver シリアライザリゾルバー
     * @param HttpClientInterface $httpClient HTTPクライアント
     * @param LoggerInterface $logger ロガー
     * @param NormalizerInterface $normalizer ノーマライザー
     * @param AceConfigService $aceConfigService 設定サービス
     */
    public function __construct(
        SerializerResolver $serializerResolver,
        HttpClientInterface $httpClient,
        LoggerInterface $logger,
        NormalizerInterface $normalizer,
        AceConfigService $aceConfigService,
    ) {
        $this->serializerResolver = $serializerResolver;
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->normalizer = $normalizer;
        $this->aceConfigService = $aceConfigService;
        $this->requestMethod = $this->getHttpMethod();
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata(): ClientMetadataInterface
    {
        return new ClientMetadata($this->requestMethod, $this->endpoint, $this->request ?? []);
    }

    /**
     * {@inheritDoc}
     */
    public function withHeaders(array $headers): ClientInterface
    {
        $this->headers = array_merge_recursive($this->headers, $headers);

        return $this;
    }

    public function withEndpoint(string $endpoint): ClientInterface
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withRequest($request): ClientInterface
    {
        $this->request = $request;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withResponseAs(string $object): ClientInterface
    {
        $this->responseObject = $object;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function send(): Response\ResponseInterface
    {
        $options = $this->buildOptions();
        $uri = $this->buildUri();

        $this->logger->debug(sprintf(
            "[AceClient] リクエスト送信 - URI: '%s', メソッド: '%s', コンテンツ: %s",
            $uri ?: 'empty',
            $this->requestMethod,
            $options['body'] ?? 'empty'
        ));

        $rawResponse = $this->httpClient->request(
            $this->requestMethod,
            $uri,
            $options
        );

        return $this->deserializeResponse($rawResponse);
    }

    /**
     * リクエスト用のURIを構築
     *
     * @return string
     */
    protected function buildUri(): string
    {
        return $this->endpoint;
    }

    /**
     * リクエスト用のオプションを構築
     *
     * @return array<string, array<string, string[]>>
     */
    protected function buildOptions(): array
    {
        return [
            'headers' => $this->headers,
        ];
    }

    /**
     * リクエストをシリアル化
     *
     * @return string
     *
     * @throws Exception\CanNotBuildRequestException
     */
    protected function serializeRequest(): string
    {
        if (empty($this->request)) {
            return '';
        }

        try {
            $apiType = $this->getApiType();
            $format = $this->getRequestFormat();

            $serializer = $this->serializerResolver->resolveForSerialization($apiType, $format);

            return $serializer->serialize($this->request, $format);
        } catch (\Throwable $t) {
            $this->logger->error("API Client serialization error: {$t->getMessage()}");
            throw new Exception\CanNotBuildRequestException('Cannot serialize request data', $t);
        }
    }

    /**
     * リクエストを配列にシリアル化
     *
     * @return array
     *
     * @throws Exception\CanNotBuildRequestException
     */
    protected function serializeRequestToArray(): array
    {
        if (empty($this->request)) {
            return [];
        }

        try {
            $format = $this->getRequestFormat();

            // ノーマライザーを使用してデータを配列に変換
            $normalizedData = $this->normalizer->normalize($this->request, $format);

            return is_array($normalizedData) ? $normalizedData : [];
        } catch (\Throwable $t) {
            $this->logger->error("API Client normalization error: {$t->getMessage()}");
            throw new Exception\CanNotBuildRequestException('Cannot normalize request data to array', $t);
        }
    }

    /**
     * PSRレスポンスをResponseInterfaceに逆シリアル化
     *
     * @param PsrResponse $psrResponse クライアントからのrawレスポンス
     *
     * @return Response\ResponseInterface
     *
     * @throws Exception\CanNotBuildResponseException
     */
    protected function deserializeResponse(PsrResponse $psrResponse): Response\ResponseInterface
    {
        try {
            $responseContent = $psrResponse->getBody()->getContents();
            $this->logger->debug(sprintf(
                '[AceClient] APIレスポンス - ステータス: %s, コンテンツ: %s',
                $psrResponse->getStatusCode(),
                $responseContent ?: 'empty'
            ));

            $response = empty($this->responseObject)
                        ? $responseContent
                        : $this->deserializeResponseContent($responseContent, $psrResponse);
        } catch (\Throwable $t) {
            $this->logger->error("[AceClient] エラー: {$t->getMessage()}");
            throw new Exception\CanNotBuildResponseException('レスポンスコンテンツの取得と逆シリアル化に失敗しました', $t);
        }

        return new Response\Response($psrResponse->getHeaders(), $response, $psrResponse->getStatusCode());
    }

    /**
     * レスポンスコンテンツを逆シリアル化
     *
     * @param string $content コンテンツ
     * @param PsrResponse $psrResponse PSRレスポンス
     */
    protected function deserializeResponseContent(string $content, PsrResponse $psrResponse)
    {
        $responseFormat = $this->getResponseDeserializationFormat($psrResponse);
        $apiType = $this->getApiType();

        // シリアライザリゾルバーで適切なシリアライザを解決
        $serializer = $this->serializerResolver->resolveForDeserialization($apiType, $responseFormat);

        // DefaultSerializerは常にtrue返すので、必ずシリアライザが見つかる
        return $serializer->deserialize($content, $this->responseObject, $responseFormat);
    }

    /**
     * PSRレスポンスの逆シリアル化フォーマットを取得
     *
     * @param PsrResponse $psrResponse PSRレスポンス
     *
     * @return string
     */
    protected function getResponseDeserializationFormat(PsrResponse $psrResponse): string
    {
        $responseContentType = $psrResponse->getHeaderLine('content-type');
        $contentTypeToFormatMap = [
            'application/soap+xml' => self::FORMAT_XML,
            'application/json' => self::FORMAT_JSON,
            'application/x-json' => self::FORMAT_JSON,
            'application/ld+json' => self::FORMAT_JSON,
            'text/xml' => self::FORMAT_XML,
            'application/xml' => self::FORMAT_XML,
            'application/x-xml' => self::FORMAT_XML,
            'text/csv' => self::FORMAT_CSV,
        ];

        foreach ($contentTypeToFormatMap as $contentType => $format) {
            if (str_contains($responseContentType, $contentType)) {
                return $format;
            }
        }

        throw new \InvalidArgumentException(sprintf('サポートされていないContent-Type: %s', $responseContentType));
    }

    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }
}
