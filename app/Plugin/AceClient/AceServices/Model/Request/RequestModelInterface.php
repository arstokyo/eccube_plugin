<?php

namespace Plugin\AceClient43\AceServices\Model\Request;

use Plugin\AceClient43\AceServices\Model\CustomDataType;

/**
 * Interface for Request Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface RequestModelInterface extends CustomDataType\SoapRequestAbleInterface, CustomDataType\EnsureParameterNotMissingInterface
{
}