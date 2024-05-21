<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Plugin\AceClient\AceServices\Model\CustomDataType;

interface RequestModelInterface extends CustomDataType\SoapRequestAbleInterface, CustomDataType\EnsureParameterNotMissingInterface
{

}