<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

interface SoapNodeRequestInterface
{
    /**
     * Set Node Name
     * 
     * @param string $name
     */
    public function setXmlNodeName(string $name): void;

    /**
     * Get Node Name
     * 
     * @return string
     */
    public function getXmlNodeName(): string;
}