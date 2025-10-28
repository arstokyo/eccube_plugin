<?php

namespace Plugin\AceClient43\AceServices\AceMethod;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\ApiClient\Client\ClientCacheableHelper;
use Plugin\AceClient43\ApiClient\Response\ResponseInterface;
use Plugin\AceClient43\Exception\MissingRequestParameterException;

/**
 * Trait for methods that support request caching
 *
 * This trait provides caching functionality for API methods.
 * Classes using this trait must extend AceMethodAbstract.
 */
trait RequestCacheableTrait
{
    /**
     * Set request with caching disabled by default
     *
     * @param RequestModelInterface $requestModel
     *
     * @return self
     *
     * @throws MissingRequestParameterException
     */
    public function withRequest(RequestModelInterface $requestModel): self
    {
        $this->apiClient->withEndpoint($this->buildEndPoint());

        ClientCacheableHelper::disableCaching($this->apiClient);

        return parent::withRequest($requestModel);
    }

    /**
     * Enable caching with factory and modifier
     *
     * @param callable $requestFactory Factory to create request DTO on cache miss
     * @param string|null $cacheKey Optional cache key for identification
     * @param callable|null $requestModifier Modifier to update cached XML
     *
     * @return self
     */
    public function withCaching(callable $requestFactory, ?string $cacheKey = null, ?callable $requestModifier = null): self
    {
        $this->apiClient->withEndpoint($this->buildEndPoint());

        ClientCacheableHelper::enableCaching($this->apiClient, $requestFactory, $cacheKey, $requestModifier);

        return $this;
    }

    /**
     * Send the request with caching support
     *
     * @return ResponseInterface
     */
    public function send(): ResponseInterface
    {
        $this->apiClient->withResponseAs($this->getResponseAsObject());

        return $this->apiClient->send();
    }

    /**
     * Clear the request cache for this method
     *
     * @return void
     */
    public function clearCache(): void
    {
        ClientCacheableHelper::clearCache($this->apiClient);
    }
}
