<?php

namespace Plugin\AceClient\AceServices;

use Plugin\AceClient\AceServices\Service;
use Plugin\AceClient\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Factory for AceService
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceServiceFactory 
{
    
    /**
     * AceServiceFactory constructor.
     * 
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct
    (
        private ServiceRetrieverInterface $serviceRetriever
    )
    {
    }

    /**
     * Make new JyudenService
     * 
     * @return Service\JyudenService
     */
    public function makeJyudenService() : Service\JyudenService
    {
        return new Service\JyudenService($this->serviceRetriever);
    }

    /**
     * Make new MemberService
     * 
     * @return Service\MemberService
     */
    public function makeMemberService() : Service\MemberService
    {
        return new Service\MemberService($this->serviceRetriever);
    }

    /**
     * Make new GoodsService
     *
     * @return Service\GoodsService
     */
    public function makeGoodsService() : Service\GoodsService
    {
        return new Service\GoodsService($this->serviceRetriever);
    }

    /**
     * Make new Master2Service
     * 
     * @return Service\Master2Service
     */
    public function makeMaster2Service() : Service\Master2Service
    {
        return new Service\Master2Service($this->serviceRetriever);
    }

}
