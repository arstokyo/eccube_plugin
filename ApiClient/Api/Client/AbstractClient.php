<?php

namespace Plugin\AceClient\ApiClient\Api\Client;

use Plugin\AceClient\ApiClient\Api\DelegateInterface;
use Plugin\AceClient\ApiClient\Response;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\ApiClient\Response\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponse;
use Plugin\AceClient\Exception;

/**
 * AbstractClient
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AbstractClient implements ClientInterface
{
    /** @var string $requestmethod */
    protected string $requestmethod;

    /** @var array<string, string[]> */
    protected array $headers = [];

    /** @var \JsonSerializable|RequestModelInterface|array<mixed, mixed> */
    protected \JsonSerializable|RequestModelInterface|array $request = [];

    protected ?string $responseObject = null;

    /**
     * AbstractClient constructor
     *
     * @param string            $endpoint Target endpoint.
     * @param DelegateInterface $delegate Delegate instance.
     */
    public function __construct
    (
        protected string $endpoint,
        protected DelegateInterface $delegate
    ) {
    }

    /**
     * Get Client Metadata
     *
     * @return ClientMetadataInterface
     */
    public function getMetadata(): ClientMetadataInterface
    {
        return new ClientMetadata($this->requestmethod, $this->endpoint, $this->request ?? []);
    }

    /**
     * Set Client Headers
     *
     * @param array<string, string[]> $headers Client headers.
     *
     * @return ClientInterface
     */
    public function withHeaders(array $headers): ClientInterface
    {
        $this->headers = array_merge_recursive($this->headers, $headers);
        return $this;
    }

    /**
     * Set Client Request
     *
     * @param ResponseInterface|\JsonSerializable|array<int|string, mixed> $request Client request.
     *
     * @return ClientInterface
     */
    public function withRequest(RequestModelInterface|\JsonSerializable|array $request): ClientInterface
    {
        $this->request = $request;
        return $this;
    }

    /**
     * Set Client ResponseObject
     *
     * @param class-string $object Class of the client response.
     *
     * @return ClientInterface
     */
    public function withResponseAs(string $object): ClientInterface
    {
        $this->responseObject = $object;
        return $this;
    }

    /**
     * Send a request
     *
     * @throws Exception\AceClientBaseException
     *
     * @return Response\ResponseInterface
     */
    public function send(): Response\ResponseInterface
    {
        $options = $this->buildOptions();
        $uri = $this->buildUri();
        $this->delegate->getLogger()->debug(sprintf("[AceClient] Request to uri '%s' with content: %s", $uri ?: 'empty', isset($options['body']) ? $options['body'] : 'empty'));

        $rawResponse = $this->delegate->getHttpClient()->request(
            $this->requestmethod,
            $uri ,
            $options
        );
        return $this->deserializeResponse($rawResponse);
    }

    /**
     * Build the URI for the request
     *
     * @return string
     */
    protected function buildUri(): string
    {
        return $this->endpoint;
    }

    /**
     * Build the options for the request
     *
     * @return array<string, array<string, string[]>>
     */
    protected function buildOptions(): array
    {
        return [
            'headers' => $this->headers,
        ];
    }

    /**
     * Deserialize the PsrResponse into a ResponseInterface
     *
     * @param PsrResponse $psrResponse The raw response from the client.
     *
     * @return Response\ResponseInterface
     *
     * @throws Exception\CanNotBuildResponseException
     */
    protected function deserializeResponse(PsrResponse $psrResponse): Response\ResponseInterface
    {
        try {
            $responseContent = $psrResponse->getBody()->getContents();
            $this->delegate->getLogger()->debug(sprintf("[AceClient] Api response with status %s and content: %s", $psrResponse->getStatusCode(), $responseContent ?: 'empty'));

            $response = empty($this->responseObject)
                        ? $responseContent
                        : $this->delegate->getSerializer()->deserialize(
                            $responseContent,
                            $this->responseObject,
                            $this->getResponseDeserializationFormat($psrResponse)
                        );
        } catch (\Throwable $t) {
            $this->delegate->getLogger()->error("[AceClient] error: {$t->getMessage()}");
            throw new Exception\CanNotBuildResponseException('Cannot fetch and deserialize response content', $t);
        }
        return new Response\Response($psrResponse->getHeaders(), $response, $psrResponse->getStatusCode());
    }

    /**
     * Get PsrResponse deserialization format
     *
     * @param PsrResponse $psrResponse The raw response from the client.
     *
     * @throws \InvalidArgumentException
     *
     * @return string
     */
    protected function getResponseDeserializationFormat(PsrResponse $psrResponse): string
    {
        $responseContentType    = $psrResponse->getHeaderLine('content-type');
        $contentTypeToFormatMap = [
            'application/soap+xml' => 'xml',
            'application/json'     => 'json',
            'application/x-json'   => 'json',
            'application/ld+json'  => 'json',
            'text/xml'             => 'xml',
            'application/xml'      => 'xml',
            'application/x-xml'    => 'xml',
            'text/csv'             => 'csv',
        ];
        foreach ($contentTypeToFormatMap as $contentType => $format) {
            if (str_contains($responseContentType, $contentType)) {
                return $format;
            }
        }
        throw new \InvalidArgumentException("Unsuported Content-Type: {$responseContentType}");
    }
}