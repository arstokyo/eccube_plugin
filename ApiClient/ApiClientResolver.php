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

namespace Plugin\AceClient43\ApiClient;

use Plugin\AceClient43\ApiClient\Client\ApiTypeSupportInterface;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;

/**
 * API Client Resolver Service
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ApiClientResolver
{
    /**
     * @var ClientInterface[]
     */
    private array $clients = [];

    /**
     * Constructor
     *
     * @param iterable $clients
     */
    public function __construct(iterable $clients)
    {
        foreach ($clients as $client) {
            $this->clients[] = $client;
        }
    }

    /**
     * Resolve API client by type and format
     *
     * @param string $apiType
     * @param string $format
     *
     * @return ClientInterface|null
     */
    public function resolve(string $apiType, string $format): ?ClientInterface
    {
        foreach ($this->clients as $client) {
            if ($client instanceof ApiTypeSupportInterface && $client->supports($apiType, $format)) {
                return clone $client; // Return a clone to avoid state pollution
            }
        }

        return null;
    }

    /**
     * Get all available clients
     *
     * @return ClientInterface[]
     */
    public function getAllClients(): array
    {
        return $this->clients;
    }
}
