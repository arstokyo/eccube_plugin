<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Plugin\AceClient\Config\Model\PrmFormat\PrmDetailFormatModel;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDenormalizerInterface;
use Plugin\AceClient\Utils\Denormalize\OTD\OTDDelegateInterface;

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
     * @return OTDDenormalizerInterface
     */
    public function getOTDDenormarlizer(): OTDDenormalizerInterface;

    /**
     * Get OTD Delegate
     * 
     * @return OTDDelegateInterface
     */
    public function getOTDDelegate(): OTDDelegateInterface;

    /**
     * Set OTD Delegate
     * 
     * @param OTDDelegateInterface $delegate
     * @return void
     */
    public function setOTDDelegate(OTDDelegateInterface $delegate): void;

    /**
     * Set OTD Denormalizer
     * 
     * @param OTDDenormalizerInterface $denormalizer
     * @return void
     */
    public function setOTDDenormalizer(OTDDenormalizerInterface $denormalizer): void;
    
}