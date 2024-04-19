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

    public function getXmlns(): string
    {
        return $this->xmlns;
    }

    public function setXmlns(string $xmlns): void
    {
        $this->xmlns = $xmlns;
    }

    public function getDefaultSerializeOptions(): array
    {
        return $this->defaultSerializeOptions;
    }

    public function setDefaultSerializeOptions(array $defaultSerializeOptions): void
    {
        $this->defaultSerializeOptions = $defaultSerializeOptions;
    }

    public function getRequestSoapHeader(): string
    {
        return $this->requestSoapHeader;
    }

    public function setRequestSoapHeader(string $requestSoapHeader): void
    {
        $this->requestSoapHeader = $requestSoapHeader;
    }

    public function getRequestSoapEnd(): string
    {
        return $this->requestSoapEnd;
    }

    public function setRequestSoapEnd(string $requestSoapEnd): void
    {
        $this->requestSoapEnd = $requestSoapEnd;
    }
}

