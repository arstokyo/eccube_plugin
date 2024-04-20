<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Utils\Denormalize\OTDDenormalizerInterface;
use Plugin\AceClient\Utils\Denormalize\OTDDelegate;
use Plugin\AceClient\Config\Model\PrmOTDFormatModel;
use Plugin\AceClient\Utils\ConfigLoader\PrmOTDFormatConfigLoaderTrait;

abstract class PrmModelRequestAbstract implements PrmModelRequestInterface
{
    use PrmOTDFormatConfigLoaderTrait;

    /**
     * @var OTDDenormalizerInterface $OTDDenomarlizer
     */
    private OTDDenormalizerInterface $OTDDenomarlizer;

    /**
     * @var OTDDelegate $OTDDelegate
     */
    private OTDDelegate $OTDDelegate;

    /**
     * @var PrmOTDFormatModel $config
     */
    private PrmOTDFormatModel $config;

    /**
     * Constructor.
     * 
     */
    public function __construct()
    {
        $this->config = $this->loadConfig();
        // $this->OTDDenomarlizer = $OTDDenomarlizer;
        // $this->OTDDelegate = $OTDDelegate;
    }

    /**
     * Builds the XML Denormalize Options.
     * 
     * @return array
     */
    private function buildXMlDenormalizeOptions(): array
    {
        return \array_merge($this->config->getOverrides(), ['xml_root_node_name' => $this->setXmlRootNodeName()]);
    }

    /**
     * Sets the XML Root Node Name.
     * 
     * @return string
     */
    abstract protected function setXmlRootNodeName(): string;

    /**
     * {@inheritDoc}
     */
    public function toData(): mixed
    {
        return $this->OTDDenomarlizer->denormalizeOTD($this->OTDDelegate);
    }

}

