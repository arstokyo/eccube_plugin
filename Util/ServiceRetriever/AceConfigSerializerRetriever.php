<?php

namespace Plugin\AceClient\Util\ServiceRetriever;

use Plugin\AceClient\Util\Serializer\AceConfigSerializer;

/**
 * Retriever for AceConfigSerializer.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceConfigSerializerRetriever
{
    /**
     * AceConfigSerializerRetriever constructor.
     * 
     * @param AceConfigSerializer $aceConfigSerializer
     */
    public function __construct
    (
        private AceConfigSerializer $aceConfigSerializer
    )
    {
    }

    /**
     * Get the AceConfigSerializer.
     * 
     * @return AceConfigSerializer
     */
    public function getAceConfigSerializer(): AceConfigSerializer
    {
        return $this->aceConfigSerializer;
    }
}