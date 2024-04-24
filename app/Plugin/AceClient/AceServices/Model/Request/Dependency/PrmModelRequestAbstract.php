<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Utils\Denormalize\OTD\OTDDelegate;
use Plugin\AceClient\Utils\Mapper\EncodeDefineMapper;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDenormalizerFactory;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * Abstract class for PrmModelRequest.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class PrmModelRequestAbstract implements PrmModelRequestInterface
{
    public const XML_FORMAT_NAME = EncodeDefineMapper::XML;
    public const JSON_FORMAT_NAME = EncodeDefineMapper::JSON;

    /**
     * @var PrmModelAssistantInterface $assistant
     */
    #[Ignore]
    private PrmModelAssistantInterface $assistant;

    /**
     * Constructor.
     * 
     */
    public function __construct()
    {
        $this->assistant = new PrmModelAssistant($this::class);
        self::initializeDenormalizer();
    }

    /**
     * Initializes the Denormalizer.
     * 
     * @return void
     */
    private function initializeDenormalizer(): void
    {
        $denomalizeOptions = [];
        switch ($this->assistant->getConfig()->getFormat()) {
            case self::XML_FORMAT_NAME:
                $this->assistant->setOTDDenormalizer(OTDDenormalizerFactory::makeOTDXmlDenormalizer());
                $denomalizeOptions = $this->buildXMlDenormalizeOptions();
                break;
            case self::JSON_FORMAT_NAME:
                $this->assistant->setOTDDenormalizer(OTDDenormalizerFactory::makeOTDJsonDenormalizer());
                $denomalizeOptions = $this->buildJsonDenormalizeOptions();
                break;
            default:
            $this->assistant->setOTDDenormalizer(OTDDenormalizerFactory::makeOTDObjectDenormalizer());
        }
        $this->assistant->setOTDDelegate(new OTDDelegate($this, $denomalizeOptions));
    }

    /**
     * Builds the XML Denormalize Options.
     * 
     * @return array
     */
    private function buildXMlDenormalizeOptions(): array
    {
        return \array_merge([EncodeDefineMapper::XML_ROOT_NODE_NAME => $this->setXmlRootNodeName()], $this->assistant->getConfig()->getOptions() ?? []);
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
        return $this->assistant->getOTDDenormarlizer()->denormalizeOTD($this->assistant->getOTDDelegate());
    }

}

