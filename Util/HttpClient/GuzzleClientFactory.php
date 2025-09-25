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

namespace Plugin\AceClient43\Util\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Plugin\AceClient43\Service\AceConfigService;
use Plugin\AceClient43\Util\Mapper\OverviewMapper;

/**
 * Simple factory for creating Guzzle HTTP Client with ACE configuration
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class GuzzleClientFactory
{
    private AceConfigService $aceConfigService;

    private array $options;

    public function __construct(AceConfigService $aceConfigService, array $options = [])
    {
        $this->aceConfigService = $aceConfigService;
        $this->options = $options;
    }

    /**
     * Create a configured Guzzle HTTP Client
     *
     * @return ClientInterface
     */
    public function create(): ClientInterface
    {
        $defaultConfig = [
            'timeout' => 600,
            'verify' => false,
            'headers' => [
                'User-Agent' => OverviewMapper::USER_AGENT_HEADER,
            ],
        ];

        $config = array_merge($defaultConfig, $this->options, [
            'base_uri' => $this->aceConfigService->getBaseUri(),
        ]);

        // Handle headers separately to merge them properly
        if (isset($this->options['headers']) && is_array($this->options['headers'])) {
            $config['headers'] = array_merge(
                $defaultConfig['headers'],
                $this->options['headers']
            );
        }

        return new Client($config);
    }
}
