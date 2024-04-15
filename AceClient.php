<?php

namespace Plugin\AceClient;

use Plugin\AceClient\AceService;
use Plugin\AceClient\AceService\AceServiceFactory;
use Plugin\AceClient\AceService\JyudenService;

class AceClient {

    /**
     * Make AceJyudenService
     * 
     * @return AceService\JyudenService
     */
    public function makeJyudenService() : AceService\JyudenService
    {
        return AceServiceFactory::MakeJyudenService();
    }

}
