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

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\Exception;

/**
 * クライアントのインターフェース
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface ClientInterface
{
    // APIタイプ
    public const API_TYPE_SOAP = 'soap';
    public const API_TYPE_JSON = 'json';
    public const API_TYPE_XML = 'xml';

    // フォーマット
    public const FORMAT_XML = 'xml';
    public const FORMAT_JSON = 'json';
    public const FORMAT_CSV = 'csv';

    // HTTPメソッド
    public const HTTP_METHOD_GET = 'GET';
    public const HTTP_METHOD_POST = 'POST';
    public const HTTP_METHOD_PUT = 'PUT';
    public const HTTP_METHOD_DELETE = 'DELETE';
    public const HTTP_METHOD_PATCH = 'PATCH';

    // クライアントタイプ
    public const CLIENT_TYPE_POST_SOAP_XML = 'post_soap_xml';
    public const CLIENT_TYPE_POST_JSON = 'post_json';
    public const CLIENT_TYPE_GET_JSON = 'get_json';
    public const CLIENT_TYPE_GET_XML = 'get_xml';

    // デフォルト値
    public const DEFAULT_API_TYPE = self::API_TYPE_SOAP;
    public const DEFAULT_FORMAT = self::FORMAT_XML;
    public const DEFAULT_HTTP_METHOD = self::HTTP_METHOD_POST;
    public const DEFAULT_CLIENT_TYPE = self::CLIENT_TYPE_POST_SOAP_XML;
    public const DEFAULT_TIMEOUT = 600;

    // コンテンツタイプ
    public const CONTENT_TYPE_SOAP_XML = 'application/soap+xml; charset=utf-8';
    public const CONTENT_TYPE_JSON = 'application/json; charset=utf-8';
    public const CONTENT_TYPE_XML = 'application/xml; charset=utf-8';

    /**
     * クライアントのメタデータを取得
     *
     * @return ClientMetadataInterface
     */
    public function getMetadata(): ClientMetadataInterface;

    /**
     * クライアントヘッダーを設定
     *
     * @param array<string, string[]> $headers クライアントヘッダー
     *
     * @return ClientInterface
     */
    public function withHeaders(array $headers): ClientInterface;

    /**
     * @param string $endpoint
     *
     * @return ClientInterface
     */
    public function withEndpoint(string $endpoint): ClientInterface;

    /**
     * クライアントリクエストを設定
     *
     * @param RequestModelInterface|\JsonSerializable|array<int|string, mixed> $request クライアントリクエスト
     *
     * @return ClientInterface
     */
    public function withRequest($request): ClientInterface;

    /**
     * クライアントレスポンスオブジェクトを設定
     *
     * @param class-string $object クライアントレスポンスのクラス
     *
     * @return ClientInterface
     */
    public function withResponseAs(string $object): ClientInterface;

    /**
     * クライアントリクエストを送信
     *
     * @return ResponseInterface
     *
     * @throws Exception\AceClientBaseException
     */
    public function send(): ResponseInterface;

    /**
     * このクライアントのHTTPメソッドを取得
     *
     * @return string
     */
    public function getHttpMethod(): string;

    /**
     * このクライアントのAPIタイプを取得
     *
     * @return string
     */
    public function getApiType(): string;

    /**
     * このクライアントのリクエストフォーマットを取得
     *
     * @return string
     */
    public function getRequestFormat(): string;

    public function getHttpClient(): \GuzzleHttp\ClientInterface;
}
