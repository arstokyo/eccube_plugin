<?php

namespace Plugin\AceClient\Utils\Serialize;

use Plugin\AceClient\Exception\NotCompatibleArgument;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Plugin\AceClient\AceServices\Model\Request;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\Exception;

class SoapSerializer implements SoapSerializerInterface
{
    private SerializerInterface $serializer;

    private const XMLNS = ['@xmlns'=> 'http://ar-system-api.co.jp/'];
    private const DEFAULT_SERIALIZE_OPTIONS = [ 'xml_format_output' => true,
                                                'xml_encoding' => 'utf-8',
                                                'encoder_ignored_node_types' =>  [
                                                    \XML_PI_NODE, // removes XML declaration (the leading xml tag)
                                              ],];
    private const REQ_SOAP_HEAD = '<?xml version="1.0" encoding="utf-8"?>
                                   <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
                                   <soap12:Body>';
    private const REQ_SOAP_END =  '</soap12:Body>
                                   </soap12:Envelope>';

    public function __construct(array $nomalizer = [], array $encoders = [new XmlEncoder()]) 
    {
        $this->serializer = new Serializer($nomalizer, $encoders);
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
            throw new NotCompatibleArgument("Input Data Object Not Compatible. Respected Data Type:'".RequestModelInterface::class."'");
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
    private function serializeWithOptions($data, string $format, array $context): string{
        return $this->serializer->serialize([ self::XMLNS,'#' => $data ],
                                              $format,
                                              $context 
                                                    ?? 
                                              \array_merge(['xml_root_node_name'=>$data->getXmlNodeName()],
                                                             self::DEFAULT_SERIALIZE_OPTIONS,));
    }

    private function compileWithSoapHeader(string $data): string
    {
        return self::REQ_SOAP_HEAD . $data . self::REQ_SOAP_END;
    }

}

