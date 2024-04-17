<?php

namespace Plugin\AceClient\AceServices;

use Plugin\AceClient\AceServices\Service;

class AceServiceFactory {

    /**
     * Make new JyudenService
     * 
     * @return Service\JyudenService
     */
    public static function MakeJyudenService() : Service\JyudenService
    {
        return new Service\JyudenService();
    }

}
