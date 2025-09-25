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

namespace Plugin\AceClient43\ApiClient\Response;

/**
 * Interface for Response
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface ResponseInterface extends \JsonSerializable, \Stringable
{
    /**
     * Get response headers
     *
     * @return array<array-key, array<array-key, string>>
     */
    public function getHeaders(): array;

    /**
     * Get response status code
     *
     * @return integer
     */
    public function getStatusCode(): int;

    /**
     * Get response
     *
     * @return mixed
     */
    public function getResponse();

    /**
     * Get response body
     *
     * @return string
     */
    public function isOk(): bool;
}
