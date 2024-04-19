<?php

namespace Plugin\AceClient\Config\Model;

use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\SerializedName;

class SoapXmlSerializerModel implements ConfigModelInterface
{
    #[SerializedName("xmlns")]
    private string $xmlns;

    #[SerializedName("default_serialize_options")]
    private array $defaultSerializeOptions;

    #[SerializedName("request_soap_header")]
    private string $requestSoapHeader;
    
    #[SerializedName("request_soap_end")]
    private string $requestSoapEnd;

    /**
     * Get the value of xmlns
     * 
     * @return string
     */
    public function getXmlns(): string
    {
        return $this->xmlns;
    }

    /**
     * Set the value of xmlns
     *
     * @return  void
     */
    public function setXmlns(string $xmlns): void
    {
        $this->xmlns = $xmlns;
    }

    /**
     * Get the value of defaultSerializeOptions
     * 
     * @return array
     */
    public function getDefaultSerializeOptions(): array
    {
        return $this->defaultSerializeOptions;
    }

    /**
     * Set the value of defaultSerializeOptions
     *
     * @return void
     */
    public function setDefaultSerializeOptions(array $defaultSerializeOptions): void
    {
        $this->defaultSerializeOptions = $defaultSerializeOptions;
    }
    
    /**
     * Get the value of requestSoapHeader
     * 
     * @return string
     */
    public function getRequestSoapHeader(): string
    {
        return $this->requestSoapHeader;
    }

    /**
     * Set the value of requestSoapHeader
     *
     * @return void
     */
    public function setRequestSoapHeader(string $requestSoapHeader): void
    {
        $this->requestSoapHeader = $requestSoapHeader;
    }

    /**
     * Get the value of requestSoapEnd
     * 
     * @return string
     */
    public function getRequestSoapEnd(): string
    {
        return $this->requestSoapEnd;
    }

    /**
     * Set the value of requestSoapEnd
     *
     * @return void
     */
    public function setRequestSoapEnd(string $requestSoapEnd): void
    {
        $this->requestSoapEnd = $requestSoapEnd;
    }
}

