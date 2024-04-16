<?php

namespace Plugin\AceClient\Test;

use PHPUnit\Framework\TestCase;
use Plugin\AceClient\ApiClient\ApiClient;
use Plugin\AceClient\Dependency\Normalizer;
use Plugin\AceClient\ApiClient\Api\Client;
use Symfony\Component\Serializer\Serializer;
use Psr\Log\NullLogger;

class AceClientTest extends TestCase
{
    public function testSomething(): void
    {
        $httpClient = new \GuzzleHttp\Client([
                                 'base_uri'        => 'http://www.foo.com/1.0/',
                  'timeout'         => 0,
                 'allow_redirects' => false,
                  'proxy'           => '192.168.16.1:10'
               ]);
        $serializer = new Serializer();
        $normalizer = new Normalizer();
        $nullLogger = new NullLogger();
        $apiClient = new ApiClient($httpClient,$serializer,$normalizer,$nullLogger);

        $postClient = $apiClient->makePostClient("test.com");
        $this->assertTrue(true);
    }
}
