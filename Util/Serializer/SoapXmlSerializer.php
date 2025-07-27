<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\Serializer;

use Plugin\AceClient43\AceServices\Model\Request\RequestModelInterface;
use Plugin\AceClient43\AceServices\Model\Response\AsSpecificNodeResponseInterface;
use Plugin\AceClient43\ApiClient\Client\ClientInterface;
use Plugin\AceClient43\Exception\DataTypeMissMatchException;
use Plugin\AceClient43\Exception\NotDeserializableException;
use Plugin\AceClient43\Util\Mapper\EncodeDefineMapper;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Serializer for SOAP XML API - Refactored without config files
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlSerializer implements SerializerInterface, SerializerSupportInterface
{
    private const DEFAULT_RESPONSE_NODE_NAME = 'diffgr:diffgram';
    private const PRIORITY = 100;
    private const DEFAULT_XMLNS = ['@xmlns' => 'http://ar-system-api.co.jp/'];
    private const DEFAULT_SERIALIZE_OPTIONS = [
        'xml_format_output' => true,
        'xml_encoding' => 'utf-8',
        'encoder_ignored_node_types' => [7],
    ];

    private SerializerInterface $serializer;

    private array $config;

    /**
     * Constructor - Inject Symfony Serializer directly
     *
     * @param SerializerInterface $serializer
     * @param array $config
     */
    public function __construct(SerializerInterface $serializer, array $config = [])
    {
        $this->serializer = $serializer;
        $this->config = $this->normalizeConfig($config);
    }

    /**
     * {@inheritDoc}
     */
    public function supports(string $apiType, string $format): bool
    {
        return $apiType === ClientInterface::API_TYPE_SOAP && $format === ClientInterface::FORMAT_XML;
    }

    /**
     * {@inheritDoc}
     */
    public function getPriority(): int
    {
        return self::PRIORITY;
    }

    /**
     * Serializes data in the appropriate format.
     *
     * @param RequestModelInterface $data
     * @param string $format
     * @param array[] $context
     *
     * @return string
     *
     * @throws DataTypeMissMatchException
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
     * @throws NotDeserializableException
     */
    public function deserialize($data, string $type, string $format, array $context = []): mixed
    {
        if (!$this->serializer->supportsEncoding($format, $context)) {
            throw new NotEncodableValueException(sprintf('Serialization for the format "%s" is not supported.', $format));
        }

        $data = $this->serializer->decode($data, $format, $context);
        $expectedDataArray = \in_array(AsSpecificNodeResponseInterface::class, class_implements($type), true)
            ? $type::fetchSpecificResponseNodeName()
            : self::DEFAULT_RESPONSE_NODE_NAME;

        $this->getInnerArray($expectedDataArray, $data, $matched);

        if (empty($matched)) {
            throw new NotDeserializableException(sprintf('Response data not deserializable. The data must contain "%s"', $expectedDataArray));
        }

        return $this->serializer->denormalize($matched, $type, $format, $context);
    }

    /**
     * Serialize with configured options - matches original implementation
     */
    private function serializeWithOptions(RequestModelInterface $data, string $format, array $context): string
    {
        // Get xmlns configuration (fallback to default if not set)
        $xmlns = $this->config['xmlns'] ?: self::DEFAULT_XMLNS;

        // Get default serialize options (fallback to default if not set)
        $defaultOptions = $this->config['default_serialize_options'] ?: self::DEFAULT_SERIALIZE_OPTIONS;

        // Prepare the data structure with xmlns and '#' wrapper
        $serializedData = array_merge($xmlns, ['#' => $data]);

        // Prepare context options - add root node name from request model
        $contextOptions = $context ?: [];
        $contextOptions = array_merge(
            [EncodeDefineMapper::XML_ROOT_NODE_NAME => $data->fetchRequestNodeName(),
                AbstractObjectNormalizer::SKIP_NULL_VALUES => true],
            $defaultOptions,
            $contextOptions
        );

        return $this->serializer->serialize($serializedData, $format, $contextOptions);
    }

    /**
     * Compile serialized data with SOAP headers
     */
    private function compileWithSoapHeader(string $serializedData): string
    {
        $head = $this->config['request_soap_head'] ?? '';
        $end = $this->config['request_soap_end'] ?? '';

        return trim($head)."\n".$serializedData."\n".trim($end);
    }

    /**
     * Get Inner Array (recursive search)
     */
    private function getInnerArray(string $needle, array $haystack, &$matched): void
    {
        foreach ($haystack as $key => $value) {
            if ($key === $needle) {
                $matched = $value;

                return;
            }

            if (is_array($value)) {
                $this->getInnerArray($needle, $value, $matched);
                if (!empty($matched)) {
                    return;
                }
            }
        }
    }

    /**
     * Normalize configuration with defaults
     */
    private function normalizeConfig(array $config): array
    {
        return array_merge([
            'xmlns' => self::DEFAULT_XMLNS,
            'default_serialize_options' => self::DEFAULT_SERIALIZE_OPTIONS,
            'request_soap_head' => '<?xml version="1.0" encoding="utf-8"?>
<soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
<soap12:Body>',
            'request_soap_end' => '</soap12:Body>
</soap12:Envelope>',
        ], $config);
    }
}
