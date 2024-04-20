<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

interface OTDableInterface
{
    /**
     * Returns the data.
     * 
     * @return string|null|object
     */
    public function toData(): string|null|object;
}