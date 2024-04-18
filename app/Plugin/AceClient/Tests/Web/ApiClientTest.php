<?php

namespace Plugin\AceClient\Tests\Web;

use Eccube\Tests\Web\Admin\AbstractAdminWebTestCase;
use SoapClient;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Serializer;
use Psr\Log\NullLogger;
use Plugin\AceClient\ApiClient\ApiClient;
use Plugin\AceClient\Utils\Normalize\Normalizer;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\AddCartRequestModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\OrderModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\PrmModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\MemberOrderModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\PersonModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\NmemModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\MemberModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\NmemModelAbstract;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\Dependency\PersonModelAbstract;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use \Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Doctrine\Common\Annotations\AnnotationReader;
use GuzzleHttp;


class ApiClientTest extends AbstractAdminWebTestCase
{
    private GuzzleHttp\ClientInterface $httpClient;
    public function testSomething(): void
    {
        try {
            $httpClient = new \GuzzleHttp\Client([
                'base_uri'        => 'http://www.foo.com/1.0/',
                'timeout'         => 600,
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

    public function getRequestContent()
    {

        $member = (new MemberOrderModel)
                        ->setJmember((new PersonModel())->setCode('456'))
                        ->setSmember((new PersonModel())->setCode('123'))
                        ->setNmember((new NmemModel())->setEda(1));

        $order = (new OrderModel())->setMember($member);
        $prm = (new PrmModel())->setOrder($order);
        $addCartModel = (new AddCartRequestModel())
                             ->setId(7)
                             ->setSessid(1)
                             ->setPrm($prm);

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader));
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $nomalizer = [new ObjectNormalizer(
            classMetadataFactory: $classMetadataFactory ,
            nameConverter: new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter),
        )];

        $serializer = new Serializer($nomalizer, $encoders);
        $context = $serializer->serialize([
                                            '@xmlns'=> 'http://ar-system-api.co.jp/',
                                            '#'=> $addCartModel
                                          ],'xml',
                                          [ 'xml_root_node_name'=> $addCartModel->getXmlNodeName(), 
                                            'xml_format_output' => true,
                                            'xml_encoding' => 'Shift_JIS',]);
        var_dump($context);
        return $context;
    }

    public function testPostRequest()
    {
        $body = '<?xml version="1.0" encoding="utf-8"?>
                <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
                    <soap12:Body>
                    '.
                        $this->getRequestContent()
                    .
                    '
                    </soap12:Body>
                </soap12:Envelope>';
        $bodyTest = '<?xml version="1.0" encoding="utf-8"?>
                    <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
                    <soap12:Body>
                        <addCart xmlns="http://ar-system-api.co.jp/">
                        <id>1</id>
                        <sessId>2</sessId>
                        <prm></prm>
                        </addCart>
                    </soap12:Body>
                    </soap12:Envelope>';
                
        $this->httpClient = $this->createHttpClient();
        $request =  [
            'headers' => ['Content-Type' => 'application/soap+xml; charset=utf-8'],
            'body'    => $bodyTest,
        ];
        try {
            $response = $this->httpClient->request('POST','/service2.asmx', $request);
            var_dump($response->getBody());
        } catch(\Exception $e) {
            echo $e->getMessage();
        }

    }

    private function createHttpClient(): GuzzleHttp\ClientInterface
    {
        return new GuzzleHttp\Client(['base_uri'        => 'http://192.168.0.81:55667/',
                                       'timeout'         => 600,
                                       'allow_redirects' => false,]
                                    );
    }

}
