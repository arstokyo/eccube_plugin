<?php

namespace Plugin\AceClient;

use Plugin\AceClient\AceServices\AceServiceFactory;
use Plugin\AceClient\AceServices\Service\JyudenService;

class AceClient {

    /**
     * Make AceJyudenService
     * 
     * @return JyudenService
     */
    public function makeJyudenService() : JyudenService
    {
        return AceServiceFactory::makeJyudenService();
    }

}
