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
 * Interface for ClientMetadata
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface ClientMetadataInterface
{
    /**
     * Get client requestMethod
     *
     * @return string
     */
    public function getRequestMethod(): string;

    /**
     * Get client endpoint
     *
     * @return string
     */
    public function getUri(): string;

    /**
     * Get client request
     *
     * @return RequestModelInterface|\JsonSerializable|array<int|string, mixed>
     */
    public function getData();

    public function isRequestFromCache(): bool;
}
