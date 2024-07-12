<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Prm;

use Plugin\AceClient43\AceConfig\Model\PrmFormat\PrmDetailFormatModel;
use Plugin\AceClient43\Util\Denormalizer\OTD;

/**
 * Interface for PrmModelAssistant.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PrmModelAssistantInterface
{
    /**
     * Get config
     * 
     * @return PrmDetailFormatModel
     */
    public function getConfig(): PrmDetailFormatModel;

    /**
     * Get OTD Denormalizer
     * 
     * @return OTD\OTDDenormalizerInterface
     */
    public function getOTDDenormarlizer(): OTD\OTDDenormalizerInterface;

    /**
     * Set OTD Denormalizer
     * 
     * @param OTD\OTDDenormalizerInterface $denormalizer
     * @return void
     */
    public function setOTDDenormalizer(OTD\OTDDenormalizerInterface $denormalizer): void;
    
}