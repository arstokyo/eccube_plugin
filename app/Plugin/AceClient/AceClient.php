<?php

namespace Plugin\AceClient;

use Plugin\AceClient\AceServices\AceServiceFactory;
use Plugin\AceClient\AceServices\Service\JyudenService;
use Plugin\AceClient\AceServices\Service\MemberService;

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

    /**
     * Make MemberService
     * 
     * @return MemberService
     */
    public function makeMemberService() : MemberService
    {
        return AceServiceFactory::makeMemberService();
    }

}
