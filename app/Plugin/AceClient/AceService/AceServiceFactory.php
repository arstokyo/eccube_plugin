<?php

namespace Plugin\AceClient\AceService;

use Plugin\AceClient\AceService;

class AceServiceFactory {

    /**
     * Make new JyudenService
     * 
     * @return AceService\JyudenService
     */
    public static function MakeJyudenService() : AceService\JyudenService
    {
        return new JyudenService();
    }

}
