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

use Plugin\AceClient43\Exception\CanNotBuildRequestException;

/**
 * GetJsonClient - JSON GET implementation
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GetJsonClient extends AbstractClient
{
    private ?string $uri = null;

    /**
     * {@inheritDoc}
     *
     * @throws CanNotBuildRequestException
     */
    public function getMetadata(): ClientMetadataInterface
    {
        return new ClientMetadata($this->requestMethod, $this->buildUri(), $this->request ?? []);
    }

    /**
     * {@inheritDoc}
     */
    public function withRequest($request): ClientInterface
    {
        $this->uri = null;

        return parent::withRequest($request);
    }

    /**
     * {@inheritDoc}
     */
    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_GET;
    }

    /**
     * {@inheritDoc}
     */
    public function getApiType(): string
    {
        return self::API_TYPE_JSON;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestFormat(): string
    {
        return self::FORMAT_JSON;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $apiType
     * @param string $format
     * @param string $httpMethod
     */
    public function supports(string $apiType, string $format, string $httpMethod): bool
    {
        return $apiType === self::API_TYPE_JSON && $format === self::FORMAT_JSON && $httpMethod === self::HTTP_METHOD_GET;
    }

    /**
     * Build the request URL with query parameters for GET
     *
     * @return string
     *
     * @throws CanNotBuildRequestException
     */
    protected function buildUri(): string
    {
        if ($this->uri) {
            return $this->uri;
        }

        $baseUri = parent::buildUri();
        if (empty($this->request)) {
            $this->uri = $baseUri;

            return $baseUri;
        }

        try {
            // シリアライザを使用して配列データに変換
            $data = $this->serializeRequestToArray();
            $query = str_contains($baseUri, '?') ? '&' : '?';
            $query .= array_is_list($data)
                ? implode('&', $data)
                : http_build_query($data);
        } catch (\Throwable $t) {
            $this->logger->error("API Client error: {$t->getMessage()}");
            throw new CanNotBuildRequestException('Cannot build GET query string', $t);
        }

        $uri = sprintf('%s%s', $baseUri, $query);
        $this->uri = $uri;

        return $uri;
    }
}
