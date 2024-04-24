<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Utils\Denormalize\OTD\OTDDenormalizerInterface;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDelegate;
use Plugin\AceClient\Config\Model\PrmFormat\PrmDetailFormatModel;
use Plugin\AceClient\Utils\ConfigLoader\PrmOTDFormatConfigLoaderTrait;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDelegateInterface;

/**
 * Assistant for PrmModel.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmModelAssistant implements PrmModelAssistantInterface
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
     * @var PrmDetailFormatModel $config
     */
    private PrmDetailFormatModel $config;

    /**
     * Constructor.
     * 
     * @param string $className
     * @param string $xmlRootNodeName
     * @param array $denomalizeOptions
     */
    public function __construct(string $className)
    {
        $this->config = $this->loadConfig()->getOverridedConfig($className);
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getConfig(): PrmDetailFormatModel
    {
        return $this->config;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getOTDDelegate(): OTDDelegateInterface
    {
        return $this->OTDDelegate;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function getOTDDenormarlizer(): OTDDenormalizerInterface
    {
        return $this->OTDDenomarlizer;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setOTDDelegate(OTDDelegateInterface $delegate): void
    {
        $this->OTDDelegate = $delegate;
    }
    
    /**
     * {@inheritDoc}
     * 
     */
    public function setOTDDenormalizer(OTDDenormalizerInterface $denormalizer): void
    {
        $this->OTDDenomarlizer = $denormalizer;
    }

}