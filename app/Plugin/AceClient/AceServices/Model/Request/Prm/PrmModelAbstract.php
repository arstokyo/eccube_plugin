<?php

namespace Plugin\AceClient\AceServices\Model\Request\Prm;

use Plugin\AceClient\Utils\Denormalize\OTD;
use Plugin\AceClient\Utils\Mapper\EncodeDefineMapper;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Abstract class for Prm Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
abstract class PrmModelAbstract implements PrmModelInterface
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
        switch ($this->assistant->getConfig()->getFormat()) {
            case self::XML_FORMAT_NAME:
                $this->assistant->setOTDDenormalizer(OTD\OTDDenormalizerFactory::makeOTDXmlDenormalizer(
                                                        new OTD\OTDDelegate($this, $this->buildXMlDenormalizeOptions())       
                                                    ));
                break;
            case self::JSON_FORMAT_NAME:
                $this->assistant->setOTDDenormalizer(OTD\OTDDenormalizerFactory::makeOTDJsonDenormalizer(
                                                        new OTD\OTDDelegate($this, $this->buildJsonDenormalizeOptions())
                                                    ));
                break;
            default:
            $this->assistant->setOTDDenormalizer(OTD\OTDDenormalizerFactory::makeOTDObjectDenormalizer(
                                                    new OTD\OTDDelegate($this)
                                                ));
        }
    }

    /**
     * Builds the XML Denormalize Options.
     * 
     * @return array
     */
    private function buildXMlDenormalizeOptions(): array
    {
        return \array_merge([EncodeDefineMapper::XML_ROOT_NODE_NAME => $this->fetchPrmNodeName()], $this->assistant->getConfig()->getOptions() ?? []);
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
     * Fetch Prm Node Name when decode to XML
     * 
     * @return string
     */
    abstract protected function fetchPrmNodeName(): string;

    /**
     * {@inheritDoc}
     */
    public function toData(): string|null|object
    {
        return $this->assistant->getOTDDenormarlizer()->denormalizeOTD();
    }

    /**
     * Compile the Property Name with the class name.
     * 
     * @param string $propertyName
     * @return string
     */
    protected function compilePropertyName(string $propertyName): string
    {
        return $this::class . '.' . $propertyName;
    }

    /**
     * {@inheritDoc}
     */
    public function parseSerializer(SerializerInterface $serializer): void
    {
        $this->assistant->getOTDDenormarlizer()->getDelegate()->setSerializer($serializer);
    }

}

