<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

/**
 * Delegate Interface for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OTDDelegateInterface
{
    public function getObject(): object;

    public function getDenomarlizeOptions(): array;
}