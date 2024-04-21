<?php

namespace Plugin\AceClient\AceServices\Model\Request\Dependency;

use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * Interface SoapRequestAbleInterface
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface SoapRequestAbleInterface
{
    /**
     * Get Node Name
     * 
     * @return string
     */
    #[Ignore]
    public function getXmlNodeName(): string;
}