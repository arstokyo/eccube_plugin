<?php

namespace Plugin\AceClient\Tests\Web;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use Symfony\Component\Serializer\Serializer;
use Psr\Log\NullLogger;
use Plugin\AceClient\ApiClient\ApiClient;
use Plugin\AceClient\Utils\Normalize\Normalizer;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\OrderModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\PrmModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\MemberModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\NmemModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\PersonModelAbstract;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


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

        $postClient = $apiClient->makePostClient("test.com");
        $postClient->withHeaders(["test" => "test value"]);
        $this->assertTrue(true);
    }

    public function testAsignValueForAddCartMethod(): void
    {
        $nmem = new NmemModelAbstract();
        $nmem->setNouEda(1);
        
        $jmem = new PersonModelAbstract();
        $jmem->setPersonCode('123');

        $smem = new PersonModelAbstract();
        $smem->setPersonCode('234');

        $member = new MemberModelAbstract;
        $member->setJmember($jmem);
        $member->setSmember($smem);
        $member->setNmember($nmem);

        $order = new OrderModel();
        $order->setMember($member);

        $prm = new PrmModel();
        $prm->setOrder($order);

        $addCartModel = new AddCartRequestModel();
        $addCartModel->setId(7);
        $addCartModel->setSessid(1);
        $addCartModel->setPrm($prm);

        $serializer = new Serializer();
        $context = $serializer->serialize($addCartModel,'xml');
        echo $context;
    }

}
