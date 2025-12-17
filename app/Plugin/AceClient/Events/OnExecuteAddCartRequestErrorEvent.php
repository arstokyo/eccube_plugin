<?php

namespace Plugin\AceClient43\Events;

use Plugin\AceClient43\Converter\AddCartFlow;
use Plugin\AceClient43\Exception\CouldNotAddCartException;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event dispatched when an add cart request fails
 */
class OnExecuteAddCartRequestErrorEvent extends Event
{
    private \Throwable $exception;
    private array $options;
    private ?string $cacheKey;
    private bool $fromCache;
    private array $context;

    public function __construct(\Throwable $exception, array $context, array $options, bool $fromCache, ?string $cacheKey)
    {
        $this->exception = $exception;
        $this->context = $context;
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

    public function getContext(): array
    {
        return $this->context;
    }

    public function isCartAddFlow(): bool
    {
        return ($flow = $this->getFlow()) instanceof AddCartFlow && $flow->isCartAdd();
    }

    public function isShoppingAddFlow(): bool
    {
        return ($flow = $this->getFlow()) instanceof AddCartFlow && $flow->isShoppingAdd();
    }

    public function getFlow(): ?AddCartFlow
    {
        return $this->context['flow'] ?? null;
    }

    public function isCouldNotAddCartException(): bool
    {
        return $this->exception instanceof CouldNotAddCartException;
    }

    public function isPointExceededError(): bool
    {
        return $this->exception instanceof CouldNotAddCartException && $this->exception->isPointExceededError();
    }

    public function isContainsErrorText(string $needle): bool
    {
        return $this->exception instanceof CouldNotAddCartException && $this->exception->containsErrorText($needle);
    }
}
