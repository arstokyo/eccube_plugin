<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Plugin\AceClient\AceServices\Model\Request\Dependency\SoapRequestAbleInterface;
use Plugin\AceClient\AceServices\Model\Dependency\EnsureValidParametersInterface;

interface RequestModelInterface extends SoapRequestAbleInterface, EnsureValidParametersInterface
{

}