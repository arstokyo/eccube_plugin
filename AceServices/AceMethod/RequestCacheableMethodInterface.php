<?php

namespace Plugin\AceClient43\AceServices\AceMethod;

interface RequestCacheableMethodInterface
{
    /**
     * Enable caching with a factory for request creation
     *
     * @param callable $requestFactory Factory to create request DTO on cache miss
     * @param string|null $cacheKey
     * @param callable|null $requestModifier Modifier to update cached XML
     * @return self
     */
    public function withCaching(callable $requestFactory, ?string $cacheKey = null, ?callable $requestModifier = null): self;

    /**
     * Clear the request cache for this method
     *
     * @return void
     */
    public function clearCache(): void;
}
