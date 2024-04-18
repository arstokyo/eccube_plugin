<?php

namespace Plugin\AceClient\AceServices\Model\Request;

use Symfony\Component\Serializer\Annotation\Ignore;

class RequestModelAbstract implements RequestModelInterface
{
    /** @var string $rootNoodName Root Node Name */
    // #[Ignore]
    protected string $rootNoodName;

    /**
     * Ensure Input Parameters are valid
     * 
     * @return boolean
     */
    public function ensureValidParameters(): bool
    {
        return true;
    }

    /**
     * Get XmlRootNodeName
     * 
     * @return string
     */
    public function getXmlNodeName(): string
    {
        return $this->rootNoodName;
    }

    /**
     * Set XmlRootNodeName
     * 
     * @param string $name
     */
    public function setXmlNodeName(string $name): void
    {
        $this->rootNoodName = $name;
    }

}