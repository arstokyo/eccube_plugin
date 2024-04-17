<?php

namespace Plugin\AceClient\Tests\Web;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Plugin\AceClient\ApiClient\ApiClient;
use Symfony\Component\Serializer\Serializer;
use Plugin\AceClient\Dependency\Normalize\Normalizer;
use Psr\Log\NullLogger;

class ApiClientTest extends AbstractAdminWebTestCase
{
    public function testSomething(): void
    {
        try {
            $httpClient = new \GuzzleHttp\Client([
                'base_uri'        => 'http://www.foo.com/1.0/',
                'timeout'         => 0,
                'allow_redirects' => false,
                'proxy'           => '192.168.16.1:10'
                ]);
                $serializer = new Serializer();
                $nullLogger = new NullLogger();
                $normalizer = new Normalizer();
                $apiClient = new ApiClient($httpClient,$serializer,$normalizer,$nullLogger);

        } catch (\Exception $e) {
            echo $e->getMessage(),'';
        }

        // $postClient = $apiClient->makePostClient("test.com");
        $this->assertTrue(true);
    }
}
