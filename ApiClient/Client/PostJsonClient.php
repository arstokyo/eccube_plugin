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

use Plugin\AceClient43\Exception;

/**
 * PostJsonClient - JSON POST implementation
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PostJsonClient extends AbstractClient
{
    /**
     * {@inheritDoc}
     */
    public function getHttpMethod(): string
    {
        return self::HTTP_METHOD_POST;
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
     */
    public function supports(string $apiType, string $format, string $httpMethod): bool
    {
        return $apiType === self::API_TYPE_JSON && $format === self::FORMAT_JSON && $httpMethod === self::HTTP_METHOD_POST;
    }

    /**
     * {@inheritDoc}
     */
    public function getSupportedApiTypes(): array
    {
        return [self::API_TYPE_JSON];
    }

    /**
     * {@inheritDoc}
     */
    public function getSupportedFormats(): array
    {
        return [self::FORMAT_JSON];
    }

    /**
     * Build the request options with JSON body
     *
     * @return array<string, array<string, string[]>>
     *
     * @throws Exception\CanNotBuildRequestException
     */
    protected function buildOptions(): array
    {
        $baseOptions = parent::buildOptions();
        if (empty($this->request)) {
            return $baseOptions;
        }

        $request = $this->serializeRequest();

        return array_merge_recursive($baseOptions, [
            'headers' => ['Content-Type' => self::CONTENT_TYPE_JSON],
            'body' => $request,
        ]);
    }
}
