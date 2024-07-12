<?php

namespace Plugin\AceClient43\AceServices\Model\CustomDataType;

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
    public function toData();
}