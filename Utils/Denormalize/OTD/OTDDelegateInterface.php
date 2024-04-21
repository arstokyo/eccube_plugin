<?php

namespace Plugin\AceClient\Utils\Denormalize\OTD;

/**
 * Delegate Interface for Object To Data.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OTDDelegateInterface
{
    /**
     * Get Object
     * 
     * @return object
     */
    public function getObject(): object;

    /**
     * Get Denormalize Options
     * 
     * @return ?array
     */
    public function getDenomarlizeOptions(): ?array;
}