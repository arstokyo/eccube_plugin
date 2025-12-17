<?php

namespace Plugin\AceClient43\Events;

use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Plugin\AceClient43\Converter\AddCartFlow;
use Symfony\Contracts\EventDispatcher\Event;

class PostExecuteAddCartRequestEvent extends Event
{
    private AddCartResponseModelInterface $response;
    private array $options;
    private bool $fromCache;
    private ?string $cacheKey;
    private array $context;

    public function __construct(
        AddCartResponseModelInterface $response,
        array $context,
        array $options,
        bool $fromCache = false,
        ?string $cacheKey = null,
    ) {
        $this->response = $response;
        $this->context = $context;
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
}
