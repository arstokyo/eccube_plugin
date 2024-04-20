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
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\OrderPrmModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\MemberOrderModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\PersonModel;
use Plugin\AceClient\AceServices\Model\Request\Jyuden\AddCart\NmemModel;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use \Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Doctrine\Common\Annotations\AnnotationReader;
use Plugin\AceClient\Utils\Serialize\SoapSerializer;
use GuzzleHttp;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Plugin\AceClient\DependecyInjection\AceClientExtension;
use Plugin\AceClient\DependecyInjection\SoapSerializerConfiguration;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Plugin\AceClient\Utils\Normalize\NormalizerFactory;


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

    public function getRequestContent(): \Plugin\AceClient\AceServices\Model\Request\RequestModelInterface
    {

        $member = (new MemberOrderModel)
                        ->setJmember((new PersonModel())->setCode('456'))
                        ->setSmember((new PersonModel())->setCode('123'))
                        ->setNmember((new NmemModel())->setEda(1));

        $prm = (new OrderPrmModel())->setMember($member);

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

        // $serializer = new Serializer($nomalizer, $encoders);
        // $context = $serializer->serialize([
        //                                     '@xmlns'=> 'http://ar-system-api.co.jp/',
        //                                     '#'=> $addCartModel
        //                                   ],'xml',
        //                                   [ 'xml_root_node_name'=> $addCartModel->getXmlNodeName(), 
        //                                     'xml_format_output' => true,
        //                                     'xml_encoding' => 'utf-8',
        //                                     'encoder_ignored_node_types' =>  [
        //                                         \XML_PI_NODE, // removes XML declaration (the leading xml tag)
        //                                     ],]);
        // var_dump($context);
        return $addCartModel;
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
            'body'    => $body,
        ];
        try {
            $response = $this->httpClient->request('POST','/ACEXML/Jyuden/service2.asmx', $request);
            $responseContent = $response->getBody()->getContents();
            var_dump($responseContent);
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
                // return new GuzzleHttp\Client(['base_uri'        => 'http://192.168.0.77:20443/',
                //                        'timeout'         => 600,
                //                        'allow_redirects' => false,]
                //                     );
    }

    public function testSoapSerializer() 
    {

        $nomalizer = NormalizerFactory::makeAnnotationNormalizers();
        $serializer = new SoapSerializer($nomalizer);
        $result = $serializer->serialize($this->getRequestContent());
        echo $result;
        $this->httpClient = $this->createHttpClient();
        $request =  [
            'headers' => ['Content-Type' => 'application/soap+xml; charset=utf-8'],
            'body'    => $result,
        ];
        try {
            $response = $this->httpClient->request('POST','/service2.asmx', $request);
            $responseContent = $response->getBody()->getContents();
            var_dump($responseContent);
        } catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getConfigArray() 
    {

        $extension = new AceClientExtension();
        $container = new ContainerBuilder();
        $container->registerExtension($extension);

        // Load the configuration
        $extension->load([], $container);

        // Get the soap_serializer service
        $soapSerializer = $container->getParameter('soap_xml_serializer');
        
        return $soapSerializer;
        
    }

    public function loadyamlfile()
    {
        // Create a new ContainerBuilder instance
        $container = new ContainerBuilder();
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../Resource/Config'));
        $loader->load('SoapSerializer.yaml');
    }

    public function testDenormailize()
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader));
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $nomalizer = [new ObjectNormalizer(
            classMetadataFactory: $classMetadataFactory ,
            nameConverter: new MetadataAwareNameConverter($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter),
        )];

        $serializer = new Serializer($nomalizer, $encoders);

        $configs = $this->getConfigArray();

        $dto = $serializer->denormalize($configs, \Plugin\AceClient\Config\Model\SoapXmlSerializer\SoapXmlSerializerModel::class);
        echo($dto->getXmlns());
        var_dump($dto->getDefaultSerializeOptions());
    }

    public function testLoadPrmDTOFormat() {
        $orderPrm = new OrderPrmModel();
    }

}
