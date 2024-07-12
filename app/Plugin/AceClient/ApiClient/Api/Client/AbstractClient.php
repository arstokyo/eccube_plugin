<?php

namespace Plugin\AceClient43\ApiClient\Api\Client;

use Plugin\AceClient43\ApiClient\Api\DelegateInterface;
use Plugin\AceClient43\ApiClient\Response;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Psr\Http\Message\ResponseInterface as PsrResponse;
use Plugin\AceClient43\Exception;

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
    protected $request = [];

    protected ?string $responseObject = null;

    protected string $endpoint;

    protected DelegateInterface $delegate;

    /**
     * AbstractClient constructor
     *
     * @param string            $endpoint Target endpoint.
     * @param DelegateInterface $delegate Delegate instance.
     */
    public function __construct
    (
        string $endpoint,
        DelegateInterface $delegate
    ) {
        $this->endpoint = $endpoint;
        $this->delegate = $delegate;
    }

    /**
     * {@inheritDoc}
     */
    public function getMetadata(): ClientMetadataInterface
    {
        return new ClientMetadata($this->requestmethod, $this->endpoint, $this->request ?? []);
    }

    /**
     * {@inheritDoc}
     */
    public function withHeaders(array $headers): ClientInterface
    {
        $this->headers = array_merge_recursive($this->headers, $headers);
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function withRequest($request): ClientInterface
    {
        $this->request = $request;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function withResponseAs(string $object): ClientInterface
    {
        $this->responseObject = $object;
        return $this;
    }

    /**
     * {@inheritDoc}
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

        throw new \InvalidArgumentException(sprintf('Unsuported Content-Type: %s', $responseContentType));
    }

    /**
     * Try to serialize the request object to specified format
     * 
     * @param string specified format $format
     * 
     * @return string
     * 
     * @throws Exception\CanNotBuildRequestException
     */
    protected function serializeRequest(string $format): string
    {
        try {
            $serializedRequest = $this->delegate->getSerializer()->serialize($this->request, $format);
        } catch (\Throwable $t) {
            $this->delegate->getLogger()->error(sprintf('API Client error: %s', $t->getMessage()));
            throw new Exception\CanNotBuildRequestException(sprintf("Cannot build %s request body", $this->requestmethod), $t);
        }

        return $serializedRequest;
    }
}