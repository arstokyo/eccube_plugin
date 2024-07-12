<?php

namespace Plugin\AceClient43\AceServices\Model\Request\Prm;

use Plugin\AceClient43\AceServices\Model\CustomDataType;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Interface for PrmModelRequest.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PrmModelInterface extends CustomDataType\OTDableInterface, CustomDataType\EnsureParameterNotMissingInterface
{
    
    /**
     * Parse Serializer
     * 
     * @param SerializerInterface $serializer
     */
    public function parseSerializer(SerializerInterface $serializer): void;

}