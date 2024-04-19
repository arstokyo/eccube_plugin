<?php

namespace Plugin\AceClient\Utils\ConfigLoader;

use Symfony\Component\Yaml\Yaml;

class ConfigLoader {
    private $config;

    public function __construct() {
        // $this->config = $this->loadConfig();
    }

    private function loadConfig() {
        // $configFile = '/path/to/config.yaml';
        // $config = yaml_parse_file($configFile);
        // if (!$config) {
        //     throw new Exception('Failed to load config from ' . $configFile);
        // }
        // return $config;
    }

    public function getConfig() {
        return $this->config;
    }
}