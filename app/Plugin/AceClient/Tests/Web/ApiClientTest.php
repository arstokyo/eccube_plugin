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
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;


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

        $member = (new MemberModelAbstract)
                        ->setJmember((new PersonModelAbstract())->setPersonCode('456'))
                        ->setSmember((new PersonModelAbstract())->setPersonCode('123'))
                        ->setNmember((new NmemModelAbstract())->setNouEda(1));

        $order = (new OrderModel())->setMember($member);
        $prm = (new PrmModel())->setOrder($order);
        $addCartModel = (new AddCartRequestModel())
                             ->setId(7)
                             ->setSessid(1)
                             ->setPrm($prm);

        $loader = new AnnotationLoader();
        $classMetadataFactory = new ClassMetadataFactory($loader);
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $nomalizer = [new ObjectNormalizer($classMetadataFactory)];

        $serializer = new Serializer($nomalizer, $encoders);
        $context = $serializer->serialize($addCartModel,'json');
        echo $context;
        $this->assertNotNull($context);
    }

}
