<?php

namespace Plugin\AceClient\ApiClient\Response;

use Plugin\AceClient\AceServices\Model\Response\ResponseModelInterface;

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
    public function getResponse(): mixed;
}