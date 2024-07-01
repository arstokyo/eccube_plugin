<?php

namespace Plugin\AceClient\Util\Serializer;

use Plugin\AceClient\Exception\DataTypeMissMatchException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Plugin\AceClient\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient\AceConfig\Model\SoapXmlSerializer\SoapXmlSerializerModel;
use Plugin\AceClient\Util\ConfigLoader\SoapXmlSerializerConfigLoaderTrait;
use Plugin\AceClient\Util\Mapper\EncodeDefineMapper;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Plugin\AceClient\Exception\NotDeserializableException;
use Plugin\AceClient\AceServices\Model\Response\AsSpecificNodeResponseInterface;

/**
 * Serializer for SOAP XML API.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlSerializer implements SoapXmlSerializerInterface
{
    public const DEFAULT_XMLNS = ['@xmlns' => 'http://ar-system-api.co.jp/'];
    public const DEFAULT_REQUEST_SOAP_HEAD = '<?xml version="1.0" encoding="utf-8"?>
    <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
    <soap12:Body>';

    public const DEFAULT_REQUEST_SOAP_END = '</soap12:Body></soap12:Envelope>';

    public const DEFAULT_SERIAlIZE_OPTIONS = ['xml_format_output' => true,
                                              'xml_encoding' => 'utf-8',
                                              'encoder_ignored_node_types' => [7]];

    /**
     * @var Serializer $serializer
     */
    private SerializerInterface $serializer;

    private const DEFAULT_RESPONSE_NODE_NAME = 'diffgr:diffgram';

    /**
     * @var SoapXmlSerializerModel $config
     */
    private SoapXmlSerializerModel $config;
    
    use SoapXmlSerializerConfigLoaderTrait;

    /**
     * Constructor.
     * 
     * @param array $nomalizer
     * @param array $encoders
     * @param AceConfigSerializer $aceConfigSerializer
     */
    public function __construct(array $nomalizer, array $encoders, AceConfigSerializer $aceConfigSerializer) 
    {
        $this->serializer = SerializerFactory::makeSerializer($nomalizer, $encoders);
        $this->config = $this->loadConfig($aceConfigSerializer);
    }

    /**
     * Serializes data in the appropriate format.
     * 
     * @param RequestModelInterface $data
     * @param string|null $format
     * @param array[] $context
     * 
     * @throws DataTypeMissMatchException
     * 
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function serialize($data, string $format = EncodeDefineMapper::XML, array $context = []): string
    {
        if (!$data instanceof RequestModelInterface) {
            throw new DataTypeMissMatchException(sprintf('Given data is not serializable. Respected object type "%s"', RequestModelInterface::class));
        }
        return $this->compileWithSoapHeader($this->serializeWithOptions($data, $format, $context));
    }

    /**
     * Deserializes data into the given type.
     * 
     * @param mixed $data
     * @param string $type
     * @param string $format
     * @param array $context
     * 
     * @return mixed
     * 
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    public function deserialize($data, string $type, string $format, array $context = [])
    {
        if (!$this->serializer->supportsEncoding($format, $context)) {
            throw new NotEncodableValueException(sprintf('Serialization for the format "%s" is not supported.', $format));
        }

        $data = $this->serializer->decode($data, $format, $context);
        $expectedDataArray = \in_array(AsSpecificNodeResponseInterface::class, class_implements($type), true) ? $type::fetchSpecificResponseNodeName() : self::DEFAULT_RESPONSE_NODE_NAME;
        $this->getInnerArray($expectedDataArray, $data, $matched);

        if (empty($matched)) {
            throw new NotDeserializableException(sprintf('Response data not deserializable. The data must contain "%s"', $expectedDataArray));
        }

        return $this->serializer->denormalize($matched, $type, $format, $context);
    }

    /**
     * Get Inner Array
     * 
     * @param string $needle
     * @param array $haystack
     * @param array $matched
     * 
     * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
     */
    private function getInnerArray($needle, $haystack, &$matched = null)
    {
        if (is_array($haystack) && count($haystack) > 0) {
            foreach ($haystack as $key => $value) {
                if ((string)$key === (string)$needle) {
                    if (is_array($value)) {
                        $matched = $value;
                    // // } else {
                    // //     $matched[] = $value;
                    }
                } else {
                    if (is_array($value) && count($value) > 0) {
                        self::getInnerArray($needle, $value, $matched);
                    }
                }
            }
        }   
        return true;
    } 

    /**
     * Serialize With Options
     * 
     * @param array|RequestModelInterface|null $data
     * @param string $format
     * @param array $context
     * 
     * @return string
     */
    private function serializeWithOptions($data, string $format, array $context = []): string
    {
        return $this->serializer->serialize( \array_merge($this->config->getXmlns() ?: self::DEFAULT_XMLNS
                                                         ,['#' => $data])
                                            , $format
                                            , $context ?: \array_merge([EncodeDefineMapper::XML_ROOT_NODE_NAME => $data->fetchRequestNodeName()],
                                                                       $this->config->getDefaultSerializeOptions() ?: self::DEFAULT_SERIAlIZE_OPTIONS,)
                                            ,);
    }

    /**
     * Compile With Soap Header
     * 
     * @param string $data
     */
    private function compileWithSoapHeader(string $data): string
    {
        return   ($this->config->getRequestSoapHead() ?: self::DEFAULT_REQUEST_SOAP_HEAD)
               . $data 
               . ($this->config->getRequestSoapEnd() ?: self::DEFAULT_REQUEST_SOAP_END);
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig(): SoapXmlSerializerModel
    {
        return $this->config;
    }

}

