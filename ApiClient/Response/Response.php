<?php

namespace Plugin\AceClient\ApiClient\Response;

/**
 * Class for Api Client Response
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class Response implements ResponseInterface
{
    private array $headers;
    private $response;
    private int $statusCode = 200;

    /**
     * Response constructor
     *
     * @param array<array-key, array<array-key, string>> $headers    Response headers.
     * @param mixed                                      $response   Response data.
     * @param integer                                    $statusCode Response status code.
     */
    public function __construct
    (
        array $headers,
        $response,
        int $statusCode = 200
    ) {
        $this->headers    = $headers;
        $this->response   = $response;
        $this->statusCode = $statusCode;
    }

    /**
     * {@inheritdoc}
     *
     * @return array<array-key, array<array-key, string>>
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * {@inheritdoc}
     *
     * @return integer
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * {@inheritdoc}
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Response JSON representation
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'headers' => $this->getHeaders(),
            'status'  => $this->getStatusCode(),
            'content' => $this->getResponse(),
        ];
    }

    /**
     * Response string representation
     *
     * @return string
     */
    public function __toString(): string
    {
        // phpcs:disable Generic.Files.LineLength.TooLong
        return json_encode($this, (JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE | JSON_PRESERVE_ZERO_FRACTION));
        // phpcs:enable
    }
}