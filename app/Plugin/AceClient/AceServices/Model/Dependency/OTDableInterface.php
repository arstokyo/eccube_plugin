<?php

namespace Plugin\AceClient\AceServices\Model\Dependency;

interface OTDableInterface
{
    /**
     * Returns the data.
     * 
     * @return mixed
     */
    public function toData(): mixed;
}