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
        $httpClient = $this->config->getHttpClient();
        $serializer = $this->config->getSerializer();
        $logger = $this->config->getLogger();
        $normalizer = $this->config->getNormalizer();
        $apiCLient = $this->config->getApiCLient();
        echo 'ok';
    }

}