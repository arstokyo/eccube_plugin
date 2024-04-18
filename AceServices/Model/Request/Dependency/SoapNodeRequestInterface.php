<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Symfony\Component\Serializer\Annotation\Ignore;

interface SoapNodeRequestInterface
{
    /**
     * Get Node Name
     * 
     * @return string
     */
    #[Ignore]
    public function getXmlNodeName(): string;
}