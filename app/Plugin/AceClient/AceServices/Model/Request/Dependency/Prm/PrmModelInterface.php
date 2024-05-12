<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency\Prm;

use Plugin\AceClient\AceServices\Model\Request\Dependency;

/**
 * Interface for PrmModelRequest.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PrmModelInterface extends Dependency\OTDableInterface, Dependency\EnsureParameterNotMissingInterface
{
    
}