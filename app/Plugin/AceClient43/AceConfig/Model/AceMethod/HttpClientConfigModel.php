<?php

namespace Plugin\AceClient43\AceConfig\Model\AceMethod;

use Plugin\AceClient43\AceConfig\Model\ConfigModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Plugin\AceClient43\Util\ConfigLoader\ConvertToConstTrait;

/**
 * HttpClientConfigModel
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class HttpClientConfigModel extends InstanceConfigAbstract implements ConfigModelInterface
{
    use ConvertToConstTrait;
    /**
     * @var ?string $baseUri Base URI
     */
    /** @SerializedName("base_uri") */
    private ?string $baseUri = null;

    /**
     * @var ?array $headers Header
     */
    private ?array $headers = null;

    /**
     * @var ?array $options Options
     */
    private ?array $options = null;

    /**
     * Get the base URI.
     *
     * @return ?string
     */
    public function getBaseUri(): ?string
    {
        return $this->baseUri;
    }

    /**
     * Set the base URI.
     *
     * @param ?string $baseUri
     * @return void
     */
    public function setBaseUri(?string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    /**
     * Get the headers.
     *
     * @return ?array
     */
    public function getHeaders(): ?array
    {
        return $this->headers;
    }

    /**
     * Set the headers.
     *
     * @param ?array $headers
     * @return void
     */
    public function setHeaders(?array $headers): void
    {
        if (\array_key_exists('User-Agent', $headers) && \defined($headers['User-Agent'])) {
            $headers['User-Agent'] = $this->convertVarToStringConst($headers['User-Agent']);
        }
        $this->headers = $headers;
    }

    /**
     * Get the options.
     *
     * @return ?array
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * Set the options.
     *
     * @param ?array $options
     * @return void
     */
    public function setOptions(?array $options): void
    {
        $this->options = $options;
    }

}