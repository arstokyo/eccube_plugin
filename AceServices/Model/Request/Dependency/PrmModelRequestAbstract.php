<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Utils\Denormalize\OTD\OTDDenormalizerInterface;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDelegate;
use Plugin\AceClient\Config\Model\PrmFormat\PrmDetailFormatModel;
use Plugin\AceClient\Utils\ConfigLoader\PrmOTDFormatConfigLoaderTrait;
use Plugin\AceClient\Utils\Mapper\EncodeDefineMapper;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDenormalizerFactory;

abstract class PrmModelRequestAbstract implements PrmModelRequestInterface
{
    use PrmOTDFormatConfigLoaderTrait;

    public const XML_FORMAT_NAME = EncodeDefineMapper::XML;
    public const JSON_FORMAT_NAME = EncodeDefineMapper::JSON;

    /**
     * @var OTDDenormalizerInterface $OTDDenomarlizer
     */
    private OTDDenormalizerInterface $OTDDenomarlizer;

    /**
     * @var OTDDelegate $OTDDelegate
     */
    private OTDDelegate $OTDDelegate;

    /**
     * @var PrmDetailFormatModel $config
     */
    private PrmDetailFormatModel $config;

    /**
     * Constructor.
     * 
     */
    public function __construct()
    {
        $this->config = $this->loadConfig()->getOverridedConfig($this::class);
        $this->initializeDenormalizer();
    }

    /**
     * Initializes the Denormalizer.
     * 
     * @return void
     */
    private function initializeDenormalizer(): void
    {
        $denomalizeOptions = [];
        switch ($this->config->getFormat()) {
            case self::XML_FORMAT_NAME:
                $this->OTDDenomarlizer = OTDDenormalizerFactory::makeOTDXmlDenormalizer();
                $denomalizeOptions = $this->buildXMlDenormalizeOptions();
                break;
            case self::JSON_FORMAT_NAME:
                $this->OTDDenomarlizer = OTDDenormalizerFactory::makeOTDJsonDenormalizer();
                $denomalizeOptions = $this->buildJsonDenormalizeOptions();
                break;
            default:
                $this->OTDDenomarlizer = OTDDenormalizerFactory::makeOTDObjectDenormalizer();
        }
        $this->OTDDelegate = new OTDDelegate($this, $denomalizeOptions);
    }

    /**
     * Builds the XML Denormalize Options.
     * 
     * @return array
     */
    private function buildXMlDenormalizeOptions(): array
    {
        return \array_merge([EncodeDefineMapper::XML_ROOT_NODE_NAME => $this->setXmlRootNodeName()], $this->config->getOptions() ?? []);
    }

    /**
     * Builds the JSON Denormalize Options.
     * 
     * @return array
     */
    private function buildJsonDenormalizeOptions(): array
    {
        // TODO: Implement buildJsonDenormalizeOptions() method.
        return [];
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
    public function toData(): string|null|object
    {
        return $this->OTDDenomarlizer->denormalizeOTD($this->OTDDelegate);
    }

}

