<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

/**
 * Interface Object To DataAble Interface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OTDableInterface
{
    /**
     * Returns the data.
     * 
     * @return string|null|object
     */
    public function toData(): string|null|object;
}