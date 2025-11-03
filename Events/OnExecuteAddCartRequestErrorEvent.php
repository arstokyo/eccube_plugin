<?php

namespace Plugin\AceClient43\Events;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event dispatched when an add cart request fails
 */
class OnExecuteAddCartRequestErrorEvent extends Event
{
    protected \Throwable $exception;
    protected array $options;
    protected ?string $cacheKey;
    protected bool $fromCache;

    public function __construct(\Throwable $exception, array $options, bool $fromCache, ?string $cacheKey)
    {
        $this->exception = $exception;
        $this->options = $options;
        $this->fromCache = $fromCache;
        $this->cacheKey = $cacheKey;
    }

    public function getException(): \Throwable
    {
        return $this->exception;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getCacheKey(): ?string
    {
        return $this->cacheKey;
    }

    public function isFromCache(): bool
    {
        return $this->fromCache;
    }
}
