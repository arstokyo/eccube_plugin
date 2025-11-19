<?php

namespace Plugin\AceClient43\Util\DataCollector;

/**
 * Interface for traceable API clients
 */
interface TraceableApiClientInterface
{
    /**
     * Get all traced requests
     *
     * @return array
     */
    public function getTracedRequests(): array;

    /**
     * Reset traced requests
     */
    public function reset(): void;

    public function isRequestCacheableClient(): bool;
}
