<?php

namespace Plugin\AceClient\Config\Model;

use Plugin\AceClient\Config\Model\ConfigModelInterface;

class SoapXmlSerializerModel implements ConfigModelInterface
{
    private string $xmlns;
    private array $defaultSerializeOptions;
    private string $requestSoapHeader;
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

