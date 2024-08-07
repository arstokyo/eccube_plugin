<?php

namespace Plugin\AceClient\Util\HttpClient;

use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\RequestInterface;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * SoapXmlHttpClient
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlHttpClient implements ClientInterface
{
    /**
     * @var \GuzzleHttp\Client $httpClient
     */
    private ClientInterface $httpClient;

    /**
     * SoapXmlHttpClient constructor.
     * 
     */
    public function __construct(array $config = [])
    {
        $this->httpClient = HttpClientFactory::makeSoapHttpClient($config);
    }
    
    /**
     * @throws \BadMethodCallException
     */
    public function getConfig(?string $option = null)
    {
        throw new \BadMethodCallException('This method is deprecated and will be removed in guzzlehttp/guzzle:8.0');
    }
    
    /**
     * {@inheritDoc}
     * 
     */
    public function request(string $method, $uri, array $options = []): ResponseInterface
    {
        return $this->httpClient->request($method, $uri, $options);
    }

    /**
     * {@inheritDoc}
     * 
     */
    public  function requestAsync(string $method, $uri, array $options = []): PromiseInterface
    {
        return $this->httpClient->requestAsync($method, $uri, $options);
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return $this->httpClient->send($request, $options);
    }
    
    /**
     * {@inheritDoc}
     * 
     */
    public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
    {
        return $this->httpClient->sendAsync($request, $options);
    }
}