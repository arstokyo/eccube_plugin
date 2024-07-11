<?php

namespace Plugin\AceClient\AceConfig\Model\SoapXmlSerializer;

use Plugin\AceClient\AceConfig\Model\ConfigModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Plugin\AceClient\Util\ConfigLoader\ConvertToConstTrait;

/**
 * Model for SoapXmlSerializer
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class SoapXmlSerializerModel implements ConfigModelInterface
{

    use ConvertToConstTrait;

    /** @SerializedName("xmlns") */
    private ?array $xmlns = null;

    /** @SerializedName("default_serialize_options") */
    private ?array $defaultSerializeOptions = null;

    /** @SerializedName("request_soap_head") */
    private ?string $requestSoapHead = null;
    
    /** @SerializedName("request_soap_end") */
    private ?string $requestSoapEnd = null;

    /**
     * Get the value of xmlns
     * 
     * @return ?array
     */
    public function getXmlns(): ?array
    {
        return $this->xmlns;
    }

    /**
     * Set the value of xmlns
     *
     * @return void
     */
    public function setXmlns(?array $xmlns): void
    {
        $this->xmlns = $xmlns;
    }

    /**
     * Get the value of defaultSerializeOptions
     * 
     * @return ?array
     */
    public function getDefaultSerializeOptions(): ?array
    {
        return $this->defaultSerializeOptions;
    }

    /**
     * Set the value of defaultSerializeOptions
     *
     * @return void
     */
    public function setDefaultSerializeOptions(?array $defaultSerializeOptions): void
    {
        if (!empty($defaultSerializeOptions)) {
            $this->defaultSerializeOptions = $this->convertXMLConst($defaultSerializeOptions);
        }
    }
    
    /**
     * Get the value of requestSoapHeader
     * 
     * @return ?string
     */
    public function getRequestSoapHead(): ?string
    {
        return $this->requestSoapHead;
    }

    /**
     * Set the value of requestSoapHeader
     *
     * @return void
     */
    public function setRequestSoapHead(?string $requestSoapHead): void
    {
        $this->requestSoapHead = $requestSoapHead;
    }

    /**
     * Get the value of requestSoapEnd
     * 
     * @return ?string
     */
    public function getRequestSoapEnd(): ?string
    {
        return $this->requestSoapEnd;
    }

    /**
     * Set the value of requestSoapEnd
     *
     * @return void
     */
    public function setRequestSoapEnd(?string $requestSoapEnd): void
    {
        $this->requestSoapEnd = $requestSoapEnd;
    }

    /**
     * Convert XML Constants
     * 
     * @param array $defaultSerializeOptions
     * 
     * @return array
     */
    private function convertXMLConst(array $defaultSerializeOptions): array
    {
        if (\in_array(XmlEncoder::ENCODER_IGNORED_NODE_TYPES, $defaultSerializeOptions)) {
            foreach($defaultSerializeOptions[XmlEncoder::ENCODER_IGNORED_NODE_TYPES] as $key => $value) {
                $defaultSerializeOptions[XmlEncoder::ENCODER_IGNORED_NODE_TYPES][$key] = \defined($value) ? $this->convertVarToIntConst($value) : $value;
            }
        }
        
        return $defaultSerializeOptions;
    }

}

