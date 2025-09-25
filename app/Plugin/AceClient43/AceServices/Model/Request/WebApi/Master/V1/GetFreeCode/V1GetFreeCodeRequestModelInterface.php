<?php

namespace Plugin\AceClient43\AceServices\Model\Request\WebApi\Master\V1\GetFreeCode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasKubunInterface;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory\HasSyidInterface;
use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;

interface V1GetFreeCodeRequestModelInterface extends RequestModelInterface, HasSyidInterface, HasKubunInterface
{
    public function getCodes(): string;

    public function setCodes(array $codes): self;
}
