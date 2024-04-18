<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

interface SoapNodeRequestInterface
{
    /**
     * Get Node Name
     * 
     * @return string
     */
    public function getXmlNodeName(): string;
}