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

use Plugin\AceClient43\ApiClient\Api\Client\ClientInterface;
use Plugin\AceClient43\ApiClient\Api\Client\PostSoapXmlClient;
use Plugin\AceClient43\ApiClient\Api\DelegateInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\InvalidClassNameException;
use Plugin\AceClient43\Util\ClassFactory\ClassFactory;

/**
 * Factory for Api Client.
 *
 * @author v.t.nguyen <v.t.nguyen@ar-system.co.jp>
 */
final class ApiClientFactory
{
    public const DEFAULT_API_CLIENT = PostSoapXmlClient::class;

    /**
     * Make a new client instance.
     *
     * @param string $className
     * @param string $endpoint
     * @param DelegateInterface $delegate
     *
     * @return ClientInterface
     *
     * @throws InvalidClassNameException
     * @throws DataTypeMissMatchException
     */
    public static function makeClient(string $className, string $endpoint, DelegateInterface $delegate): ClientInterface
    {
        return ClassFactory::makeClassArgs($className, ClientInterface::class, $endpoint, $delegate);
    }
}
