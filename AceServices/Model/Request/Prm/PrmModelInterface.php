<?php

namespace Plugin\AceClient\AceServices\Model\Request\Prm;

use Plugin\AceClient\AceServices\Model\CustomDataType;

/**
 * Interface for PrmModelRequest.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PrmModelInterface extends CustomDataType\OTDableInterface, CustomDataType\EnsureParameterNotMissingInterface
{
    
}