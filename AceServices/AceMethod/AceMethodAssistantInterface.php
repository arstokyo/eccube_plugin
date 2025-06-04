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

namespace Plugin\AceClient43\AceServices\AceMethod;

use Plugin\AceClient43\AceConfig\Model\AceMethod\AceMethodDetailModel;
use Plugin\AceClient43\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient43\Util\ServiceRetriever\ServiceRetrieverInterface;

/**
 * Interface for Ace Method Assistant
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface AceMethodAssistantInterface
{
    /**
     * Get the Api Client.
     *
     * @return ClientInterface
     */
    public function getApiClient(): ClientInterface;

    /**
     * Get the Configuration.
     *
     * @return AceMethodDetailModel
     */
    public function getConfig(): AceMethodDetailModel;

    /**
     * Get the Service Retriever.
     *
     * @return ServiceRetrieverInterface
     */
    public function getServiceRetriever(): ServiceRetrieverInterface;
}
