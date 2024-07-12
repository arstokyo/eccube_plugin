<?php

namespace Plugin\AceClient43\AceServices\Model\Response;

/**
 * Interface for Specific Node Response
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface AsSpecificNodeResponseInterface
{
    /**
     * Fetch response as specific node name
     * 
     * @return string
     */
    public static function fetchSpecificResponseNodeName(): string;
}