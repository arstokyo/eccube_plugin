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
 * PostSoapXmlClient - SOAP XML POST実装
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PostSoapXmlClient extends AbstractClient
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
        return self::API_TYPE_SOAP;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestFormat(): string
    {
        return self::FORMAT_XML;
    }

    /**
     * {@inheritDoc}
     */
    public function supports(string $apiType, string $format): bool
    {
        return $apiType === self::API_TYPE_SOAP && $format === self::FORMAT_XML;
    }

    /**
     * SOAP XMLボディでリクエストオプションを構築
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
            'headers' => ['Content-Type' => self::CONTENT_TYPE_SOAP_XML],
            'body' => $request,
        ]);
    }
}
