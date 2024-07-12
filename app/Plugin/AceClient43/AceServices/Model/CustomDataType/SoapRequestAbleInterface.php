<?php

namespace Plugin\AceClient43\AceServices\Model\CustomDataType;

/**
 * Interface SoapRequestAbleInterface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface SoapRequestAbleInterface
{
    /**
     * Fetch Request Node Name when decode to XML
     * 
     * @return string
     */
    public function fetchRequestNodeName(): string;
}