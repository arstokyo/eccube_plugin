<?php

namespace Plugin\AceClient\Utils\Serialize;

use Plugin\AceClient\Exception\NotCompatibleArgument;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\Config\Model\SoapXmlSerializerModel;
use Plugin\AceClient\Utils\ConfigLoader\SoapXmlSerializerConfigLoaderTrait;

class SoapSerializer implements SoapSerializerInterface
{
    /**
     * @var SerializerInterface $serializer
     */
    private SerializerInterface $serializer;

    /**
     * @var SoapXmlSerializerModel $config
     */
    private SoapXmlSerializerModel $config;
    
    use SoapXmlSerializerConfigLoaderTrait;

    public function __construct(array $nomalizer = [], array $encoders = [new XmlEncoder()]) 
    {
        $this->serializer = new Serializer($nomalizer, $encoders);
        $this->config = $this->loadConfig();
    }

    /**
     * Serializes data in the appropriate format.
     * 
     * @param Request\RequestModelInterface $data
     * 
     * @throws NotCompatibleArgument
     */
    public function serialize($data, string $format = 'xml', array $context = [])
    {
        if (!$data instanceof RequestModelInterface) {
            throw new NotCompatibleArgument(sprintf('Input Data Object Not Compatible. Respected Data Type "%s"', RequestModelInterface::class));
        }
        return $this->compileWithSoapHeader($this->serializeWithOptions($data, $format, $context));
        
    }

    public function deserialize($data, string $type, string $format, array $context = [])
    {
        $this->serializer->deserialize($data, $type, $format, $context);
    }

    /**
     * Serialize With Options
     * 
     * @param Request\RequestModelInterface $data
     */
    private function serializeWithOptions($data, string $format, array $context = []): string{
        $test = \array_merge($this->config->getXmlns()
                             ,['#' => $data]);
        return $this->serializer->serialize( \array_merge($this->config->getXmlns()
                                                         ,['#' => $data])
                                            , $format
                                            , $context ?: \array_merge(['xml_root_node_name'=>$data->getXmlNodeName()],
                                                                       $this->config->getDefaultSerializeOptions(),)
                                            ,);
    }

    private function compileWithSoapHeader(string $data): string
    {
        return $this->config->getRequestSoapHeader() . $data . $this->config->getRequestSoapEnd();
    }

}

