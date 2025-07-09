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

namespace Plugin\AceClient43\AceServices\Service;

use Plugin\AceClient43\AceServices\AceMethod;
use Plugin\AceClient43\AceServices\AceServiceAbstract;
use Plugin\AceClient43\AceServices\AceServiceInterface;

/**
 * Jyuden Service
 *
 * @deprecated Inject Method as service instead of using this service. This class will be removed in the future.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class JyudenService extends AceServiceAbstract implements AceServiceInterface
{
    protected string $baseServiceName = 'Jyuden';

    /**
     * Make AddCartMethod
     *
     * @deprecated Inject AddCartMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Jyuden\AddCartMethod
     */
    public function makeAddCartMethod(): AceMethod\Jyuden\AddCartMethod
    {
        return new AceMethod\Jyuden\AddCartMethod($this->serviceRetriever);
    }

    /**
     * Make DecisionCartMethod
     *
     * @deprecated Inject DecisionCartMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Jyuden\DecisionCartMethod
     */
    public function makeDecisionCartMethod(): AceMethod\Jyuden\DecisionCartMethod
    {
        return new AceMethod\Jyuden\DecisionCartMethod($this->serviceRetriever);
    }

    /**
     * Make GetDeliveryInfoMethod
     *
     * @deprecated Inject GetDeliveryInfoMethod as service instead of using this method. This method will be removed in the future.
     *
     * @return AceMethod\Jyuden\GetDeliveryInfoMethod
     */
    public function makeGetDeliveryInfoMethod(): AceMethod\Jyuden\GetDeliveryInfoMethod
    {
        return new AceMethod\Jyuden\GetDeliveryInfoMethod($this->serviceRetriever);
    }
}
