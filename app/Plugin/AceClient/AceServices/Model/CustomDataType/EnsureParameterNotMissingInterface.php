<?php

namespace Plugin\AceClient\AceServices\Model\CustomDataType;

use Plugin\AceClient\Exception\MissingRequestParameterException;

/**
 * Interface for ensureParameterNotMissing.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface EnsureParameterNotMissingInterface
{
    /**
     * Ensure Request Parameter Not Missing
     * 
     * @throws MissingRequestParameterException
     * @return void
     */
    public function ensureParameterNotMissing(): void;
}