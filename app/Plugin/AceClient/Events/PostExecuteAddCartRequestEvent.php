<?php

namespace Plugin\AceClient43\Events;

use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PostExecuteAddCartRequestEvent extends Event
{
    private AddCartResponseModelInterface $response;

    private array $options;

    private bool $fromCache;

    private ?string $cacheKey;

    public function __construct(
        AddCartResponseModelInterface $response,
        array $options,
        bool $fromCache = false,
        ?string $cacheKey = null,
    ) {
        $this->response = $response;
        $this->options = $options;
        $this->fromCache = $fromCache;
        $this->cacheKey = $cacheKey;
    }

    public function getAddCartResponseModel(): AddCartResponseModelInterface
    {
        return $this->response;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function getTrigger(): string
    {
        return $this->options['_trigger'] ?? '';
    }

    public function isFromCache(): bool
    {
        return $this->fromCache;
    }

    public function getCacheKey(): ?string
    {
        return $this->cacheKey;
    }
}
