<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Utils\Denormalize\OTD\OTDDenormalizerInterface;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDelegate;
use Plugin\AceClient\Config\Model\PrmFormat\PrmOTDFormatModel;
use Plugin\AceClient\Utils\ConfigLoader\PrmOTDFormatConfigLoaderTrait;
use Plugin\AceClient\Utils\Mapper\EncodeDefineMapper;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDenormalizerFactory;

abstract class PrmModelRequestAbstract implements PrmModelRequestInterface
{
    use PrmOTDFormatConfigLoaderTrait;

    public const XML_FORMAT_NAME = EncodeDefineMapper::XML;
    public const JSON_FORMAT_NAME = EncodeDefineMapper::JSON;

    public const OBJECT_FORMAT = 'object';

    /**
     * @var string $format
     */
    private string $format = self::OBJECT_FORMAT;

    /**
     * @var array $denormalizeOptions
     */
    private array $denormalizeOptions = [];

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
        $this->loadFormat();
        $this->initializeDenormalizer();
        $this->OTDDelegate = new OTDDelegate($this, $this->denormalizeOptions);
    }

    /**
     * Loads the Format.
     * 
     * @return void
     */
    private function loadFormat(): void
    {
        $specificFormat = null;    
        if ($this->config->getSpecificOverride($this::class)) {
            $specificFormat = $this->config->getSpecificOverride($this::class)->getFormat();
        } 
        
        if (empty($specificFormat) && ($this->config->getDefaultConfig())) {
            $specificFormat = $this->config->getDefaultConfig()->getFormat();
        }
        $this->format = $specificFormat ?: $this->format;
    }

    /**
     * Initializes the Denormalizer.
     * 
     * @return void
     */
    private function initializeDenormalizer(): void
    {
        switch ($this->format) {
            case self::XML_FORMAT_NAME:
                $this->OTDDenomarlizer = OTDDenormalizerFactory::makeOTDXmlDenormalizer();
                $this->denormalizeOptions = $this->buildXMlDenormalizeOptions();
                break;
            case self::JSON_FORMAT_NAME:
                $this->OTDDenomarlizer = OTDDenormalizerFactory::makeOTDJsonDenormalizer();
                $this->denormalizeOptions = $this->buildJsonDenormalizeOptions();
                break;
            default:
                $this->OTDDenomarlizer = OTDDenormalizerFactory::makeOTDObjectDenormalizer();
        }
    }

    /**
     * Builds the XML Denormalize Options.
     * 
     * @return array
     */
    private function buildXMlDenormalizeOptions(): array
    {
        $options = [];
        if ($this->config->getSpecificOverride($this::class)) {
            $options = $this->config->getSpecificOverride($this::class)->getOptions();
        }
        if ((!$options) && ($this->config->getDefaultConfig()) && (self::XML_FORMAT_NAME === $this->config->getDefaultConfig()->getFormat() ?? '')) {
            $options = $this->config->getDefaultConfig()->getOptions();
        }
        return \array_merge([EncodeDefineMapper::XML_ROOT_NODE_NAME => $this->setXmlRootNodeName()], $options ?? []);
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

