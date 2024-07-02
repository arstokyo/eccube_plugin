<?php

namespace Plugin\AceClient\Tests\AceRequestTest;

use Plugin\AceClient\AceClient;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AceRequestTestAbtract extends KernelTestCase
{
    protected ?AceClient $aceClient = null;

    public function setUp(): void
    {
        if (!self::$booted) 
        {
            self::bootKernel();
        }

        if (null === $this->aceClient) 
        {
            $container = static::$kernel->getContainer();
            $this->aceClient = $container->get('plugin.ace.client');
        }
    }

    public function testAceClientInstance()
    {
        $this->assertInstanceOf(AceClient::class, $this->aceClient);
    }

}