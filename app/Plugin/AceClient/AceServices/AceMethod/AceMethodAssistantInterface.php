<?php

namespace Plugin\AceClient\AceServices\AceMethod;

use Plugin\AceClient\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient\Config\Model\AceMethod\AceMethodDetailModel;

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

}
