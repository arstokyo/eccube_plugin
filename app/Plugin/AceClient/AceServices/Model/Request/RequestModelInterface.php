<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Plugin\AceClient\AceServices\Model\Request\Dependency;

interface RequestModelInterface extends Dependency\SoapRequestAbleInterface, Dependency\EnsureParameterNotMissingInterface
{

}