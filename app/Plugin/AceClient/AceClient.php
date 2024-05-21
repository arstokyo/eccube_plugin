<?php

namespace Plugin\AceClient;

use Plugin\AceClient\AceServices\AceServiceFactory;
use Plugin\AceClient\AceServices\Service\JyudenService;
use Plugin\AceClient\AceServices\Service\MemberService;

/**
 * Class for AceClient
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
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
