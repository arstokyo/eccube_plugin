<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43;

use Plugin\AceClient43\AceServices\AceServiceFactory;
use Plugin\AceClient43\AceServices\Service;
use Plugin\AceClient43\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Class for AceClient
 *
 * @deprecated Inject Method as service instead of using this service. This class will be removed in the future.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceClient
{
    /** @var AceServiceFactory */
    private AceServiceFactory $serviceFactory;

    /**
     * AceClient constructor.
     *
     * @param ServiceRetrieverInterface $serviceRetriever
     */
    public function __construct(ServiceRetrieverInterface $serviceRetriever)
    {
        $this->serviceFactory = new AceServiceFactory($serviceRetriever);
    }

    /**
     * Make AceJyudenService
     *
     * @deprecated Inject method as service instead of using this method. This method will be removed in the future.
     *
     * @return Service\JyudenService
     */
    public function makeJyudenService(): Service\JyudenService
    {
        return $this->serviceFactory->makeJyudenService();
    }

    /**
     * Make MemberService
     *
     * @deprecated Inject method as service instead of using this method. This method will be removed in the future.
     *
     * @return Service\MemberService
     */
    public function makeMemberService(): Service\MemberService
    {
        return $this->serviceFactory->makeMemberService();
    }

    /**
     * Make GoodsService
     *
     * @deprecated Inject method as service instead of using this method. This method will be removed in the future.
     *
     * @return Service\GoodsService
     */
    public function makeGoodsService(): Service\GoodsService
    {
        return $this->serviceFactory->makeGoodsService();
    }

    /**
     * Make Master2Service
     *
     * @deprecated Inject method as service instead of using this method. This method will be removed in the future.
     *
     * @return Service\Master2Service
     */
    public function makeMaster2Service(): Service\Master2Service
    {
        return $this->serviceFactory->makeMaster2Service();
    }

    /**
     * Make Master Service
     *
     * @deprecated Inject method as service instead of using this method. This method will be removed in the future.
     *
     * @return Service\MasterService
     */
    public function makeMasterService(): Service\MasterService
    {
        return $this->serviceFactory->makeMasterService();
    }

    /**
     * Make Hanpu Service
     *
     * @deprecated Inject method as service instead of using this method. This method will be removed in the future.
     *
     * @return Service\HanpuService
     */
    public function makeHanpuService(): Service\HanpuService
    {
        return $this->serviceFactory->makeHanpuService();
    }

    /**
     * Make Contact Service
     *
     * @deprecated Inject method as service instead of using this method. This method will be removed in the future.
     *
     * @return Service\ContactService
     */
    public function makeContactService(): Service\ContactService
    {
        return $this->serviceFactory->makeContactService();
    }
}
