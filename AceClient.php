<?php

namespace Plugin\AceClient;

use Plugin\AceClient\AceServices\AceServiceFactory;
use Plugin\AceClient\AceServices\Service;

/**
 * Class for AceClient
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceClient {

    /**
     * Make AceJyudenService
     * 
     * @return Service\JyudenService
     */
    public function makeJyudenService() : Service\JyudenService
    {
        return AceServiceFactory::makeJyudenService();
    }

    /**
     * Make MemberService
     * 
     * @return Service\MemberService
     */
    public function makeMemberService() : Service\MemberService
    {
        return AceServiceFactory::makeMemberService();
    }

    /**
     * Make GoodsService
     *
     * @return Service\GoodsService
     */
    public function makeGoodsService() : Service\GoodsService
    {
        return AceServiceFactory::makeGoodsService();
    }

    /**
     * Make Master2Service
     * 
     * @return Service\Master2Service
     */
    public function makeMaster2Service() : Service\Master2Service
    {
        return AceServiceFactory::makeMaster2Service();
    }

}
