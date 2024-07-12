<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Prm;

use Plugin\AceClient43\Util\Denormalizer\OTD;
use Plugin\AceClient43\AceConfig\Model\PrmFormat\PrmDetailFormatModel;
use Plugin\AceClient43\Util\ConfigLoader\PrmOTDFormatConfigLoaderTrait;

/**
 * Assistant for PrmModel.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmModelAssistant implements PrmModelAssistantInterface
{
    use PrmOTDFormatConfigLoaderTrait;
      /**
     * @var OTD\OTDDenormalizerInterface $OTDDenomarlizer
     */
    private OTD\OTDDenormalizerInterface $OTDDenomarlizer;

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
    public function getOTDDenormarlizer(): OTD\OTDDenormalizerInterface
    {
        return $this->OTDDenomarlizer;
    }

    /**
     * {@inheritDoc}
     * 
     */
    public function setOTDDenormalizer(OTD\OTDDenormalizerInterface $denormalizer): void
    {
        $this->OTDDenomarlizer = $denormalizer;
    }

}