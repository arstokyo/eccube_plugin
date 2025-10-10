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

/**
 * ClientMetadata
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ClientMetadata implements ClientMetadataInterface
{
    private string $requestMethod;

    private string $uri;

    /** @var RequestModelInterface|\JsonSerializable|array<int|string, mixed> */
    private $data;

    /**
     * ClientMetadata constructor
     *
     * @param string $requestMethod
     * @param string $uri Client target URI.
     * @param RequestModelInterface|\JsonSerializable|array<int|string, mixed> $data Client request data.
     */
    public function __construct(
        string $requestMethod,
        string $uri,
        $data,
    ) {
        $this->requestMethod = $requestMethod;
        $this->uri = $uri;
        $this->data = $data;
    }

    /**
     * {@inheritDoc}
     */
    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    /**
     * {@inheritDoc}
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * {@inheritDoc}
     */
    public function getData()
    {
        return $this->data;
    }
}
