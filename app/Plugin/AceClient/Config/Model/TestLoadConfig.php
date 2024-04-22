<?php

namespace Plugin\AceClient\Config\Model;

use Plugin\AceClient\Utils\ConfigLoader\AceMethodConfigLoaderTrait;
use Plugin\AceClient\Config\Model\AceMethod\AceMethodDetailModel;

class TestLoadConfig
{
    use AceMethodConfigLoaderTrait;

    private AceMethodDetailModel $config;
    public function __construct()
    {
        $this->config = $this->loadConfig()->getOverridedConfig($this::class);
        $httpClient = $this->config->getApiClient();
        echo $httpClient->getBaseUri();
        echo $httpClient->getClientName();
        var_dump($httpClient->getHeaders());
        var_dump($httpClient->getOptions());
        echo 'ok';
    }

}