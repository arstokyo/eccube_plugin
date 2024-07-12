<?php

namespace Plugin\AceClient43\AceServices;

use Plugin\AceClient43\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Abstract class for AceService
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceServiceAbstract implements AceServiceInterface 
{
    protected string $baseServiceName;

    protected ServiceRetrieverInterface $serviceRetriever;

    /**
     * AceServiceAbstract constructor.
     * 
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct(ServiceRetrieverInterface $serviceRetriever) 
    {
        $this->serviceRetriever = $serviceRetriever;
    }

}
