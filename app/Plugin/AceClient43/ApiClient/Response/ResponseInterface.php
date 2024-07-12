<?php

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
}