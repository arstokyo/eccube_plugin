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

namespace Plugin\AceClient43\Tests\AceRequestTest;

use Plugin\AceClient43\AceClient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AceRequestTestAbtract extends KernelTestCase
{
    protected ?AceClient $aceClient = null;
    public const ACE_CLIENT_SERVICE_NAME = 'plugin.aceclient';

    public function setUp(): void
    {
        if (!self::$booted) {
            self::bootKernel();
        }

        if (null === $this->aceClient) {
            $container = static::$kernel->getContainer();
            $this->aceClient = $container->get(self::ACE_CLIENT_SERVICE_NAME);
        }
    }

    public function testAceClientInstance()
    {
        $this->assertInstanceOf(AceClient::class, $this->aceClient);
    }
}
