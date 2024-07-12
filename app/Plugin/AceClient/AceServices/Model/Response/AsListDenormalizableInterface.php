<?php

namespace Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for Denormalizable As List
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AsListDenormalizableInterface
{
    /**
     * Fetch response as list property
     * 
     * @return array<string><string>
     */
    public static function fetchAsListProperty(): array;
}