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
     * Fetch Request Node Name when decode to XML
     * 
     * @return string
     */
    public function fetchRequestNodeName(): string;
}