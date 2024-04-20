<?php

namespace Plugin\AceClient\Utils\Denormalize;

interface OTDDelegateInterface
{
    public function getObject(): mixed;

    public function getDenomarlizeOptions(): array;
}