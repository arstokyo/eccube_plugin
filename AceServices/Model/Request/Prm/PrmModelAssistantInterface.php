<?php

namespace Plugin\AceClient\AceServices\Model\Request\Prm;

use Plugin\AceClient\Config\Model\PrmFormat\PrmDetailFormatModel;
use Plugin\AceClient\Utils\Denormalize\OTD;

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
     * Get OTD Delegate
     * 
     * @return OTD\OTDDelegateInterface
     */
    public function getOTDDelegate(): OTD\OTDDelegateInterface;

    /**
     * Set OTD Delegate
     * 
     * @param OTD\OTDDelegateInterface $delegate
     * @return void
     */
    public function setOTDDelegate(OTD\OTDDelegateInterface $delegate): void;

    /**
     * Set OTD Denormalizer
     * 
     * @param OTD\OTDDenormalizerInterface $denormalizer
     * @return void
     */
    public function setOTDDenormalizer(OTD\OTDDenormalizerInterface $denormalizer): void;
    
}