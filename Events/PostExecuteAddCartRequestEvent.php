<?php

namespace Plugin\AceClient43\Events;

use Plugin\AceClient43\AceServices\Model\Response\Jyuden\AddCart\AddCartResponseModelInterface;
use Symfony\Contracts\EventDispatcher\Event;

class PostExecuteAddCartRequestEvent extends Event
{
    private AddCartResponseModelInterface $response;

    private array $options;

    public function __construct(
        AddCartResponseModelInterface $response,
        array $options,
    ) {
        $this->response = $response;
        $this->options = $options;
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
}
