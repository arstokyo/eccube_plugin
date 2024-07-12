<?php

namespace Plugin\AceClient43\AceServices;

use Plugin\AceClient43\AceServices\Service;
use Plugin\AceClient43\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Factory for AceService
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceServiceFactory
{
    private ServiceRetrieverInterface $serviceRetriever;
    
    /**
     * AceServiceFactory constructor.
     *
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct(ServiceRetrieverInterface $serviceRetriever) 
    {
        $this->serviceRetriever = $serviceRetriever;
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

    /**
     * Make new MasterService
     *
     * @return Service\MasterService
     */
    public function makeMasterService() : Service\MasterService
    {
        return new Service\MasterService($this->serviceRetriever);
    }

    /**
     * Make new HanpuService
     *
     * @return Service\HanpuService
     */
    public function makeHanpuService() : Service\HanpuService
    {
        return new Service\HanpuService($this->serviceRetriever);
    }

    /**
     * Make new ContactService
     *
     * @return Service\ContactService
     */
    public function makeContactService() : Service\ContactService
    {
        return new Service\ContactService($this->serviceRetriever);
    }
}
