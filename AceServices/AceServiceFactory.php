<?php

namespace Plugin\AceClient\AceServices;

use Plugin\AceClient\AceServices\Service;

/**
 * Factory for AceService
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceServiceFactory {

    /**
     * Make new JyudenService
     * 
     * @return Service\JyudenService
     */
    public static function makeJyudenService() : Service\JyudenService
    {
        return new Service\JyudenService();
    }

    /**
     * Make new MemberService
     * 
     * @return Service\MemberService
     */
    public static function makeMemberService() : Service\MemberService
    {
        return new Service\MemberService();
    }

}
