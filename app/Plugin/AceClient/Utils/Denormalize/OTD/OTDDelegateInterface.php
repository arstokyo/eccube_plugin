<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

interface OTDDelegateInterface
{
    public function getObject(): object;

    public function getDenomarlizeOptions(): array;
}