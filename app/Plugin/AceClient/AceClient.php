<?php

namespace Plugin\AceClient;

use Plugin\AceClient\AceServices\AceServiceFactory;
use Plugin\AceClient\AceServices\Service;
use Plugin\AceClient\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Class for AceClient
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceClient 
{

    /** @var AceServiceFactory $serviceFactory */
    private AceServiceFactory $serviceFactory;

    /**
     * AceClient constructor.
     * 
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct
    (
        private ServiceRetrieverInterface $serviceRetriever
    )
    {
        $this->serviceFactory = new AceServiceFactory($serviceRetriever);
    }

    /**
     * Make AceJyudenService
     * 
     * @return Service\JyudenService
     */
    public function makeJyudenService() : Service\JyudenService
    {
        return $this->serviceFactory->makeJyudenService();
    }

    /**
     * Make MemberService
     * 
     * @return Service\MemberService
     */
    public function makeMemberService() : Service\MemberService
    {
        return $this->serviceFactory->makeMemberService();
    }

    /**
     * Make GoodsService
     *
     * @return Service\GoodsService
     */
    public function makeGoodsService() : Service\GoodsService
    {
        return $this->serviceFactory->makeGoodsService();
    }

    /**
     * Make Master2Service
     * 
     * @return Service\Master2Service
     */
    public function makeMaster2Service() : Service\Master2Service
    {
        return $this->serviceFactory->makeMaster2Service();
    }

    /**
     * Meke Master Service
     * 
     * @return Service\MasterService
     */
    public function makeMasterService() : Service\MasterService
    {
        return $this->serviceFactory->makeMasterService();
    }


}
