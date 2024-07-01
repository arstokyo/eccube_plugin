<?php

namespace Plugin\AceClient\AceConfig\Model\AceMethod;

use Plugin\AceClient\AceConfig\Model\ConfigModelInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Ace Method Detail Mode Config Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceMethodDetailModel implements ConfigModelInterface
{

    /** @var ?ApiClientConfigModel $httpClient Http Client Config Model */
    /** @SerializedName("api_client") */
    private ?ApiClientConfigModel $apiClient = null;

    /** @var ?NormalizerConfigModel $normalizer */
    private ?NormalizerConfigModel $normalizer = null;

    /** @var ?SerializerConfigModel $serializer */
    private ?SerializerConfigModel $serializer = null;

    /** @var ?LoggerConfigModel $logger */
    private ?LoggerConfigModel $logger = null;

    /** @var ?HttpClientConfigModel $logger */
    /** @SerializedName("http_client") */
    private ?HttpClientConfigModel $httpClient = null;

    /**
     * Get the value of httpClient
     * 
     * @return ?ApiClientConfigModel
     */
    public function getApiClient(): ?ApiClientConfigModel
    {
        return $this->apiClient;
    }

    /**
     * Set the value of httpClient
     *
     * @param ?ApiClientConfigModel $httpClient
     * 
     * @return AceMethodDetailModel
     */
    public function setApiClient(?ApiClientConfigModel $httpClient): AceMethodDetailModel
    {
        $this->apiClient = $httpClient;
        return $this;
    }
    
    /**
     * Get the value of normalizer
     * 
     * @return ?NormalizerConfigModel
     */
    public function getNormalizer(): ?NormalizerConfigModel
    {
        return $this->normalizer;
    }

    /**
     * Set the value of normalizer
     *
     * @param ?NormalizerConfigModel $normalizer
     * 
     * @return AceMethodDetailModel
     */
    public function setNormalizer(?NormalizerConfigModel $normalizer): AceMethodDetailModel
    {
        $this->normalizer = $normalizer;
        return $this;
    }

    /**
     * Get the value of serializer
     * 
     * @return ?SerializerConfigModel
     */
    public function getSerializer(): ?SerializerConfigModel
    {
        return $this->serializer;
    }

    /**
     * Set the value of serializer
     *
     * @param ?SerializerConfigModel $serializer
     * 
     * @return AceMethodDetailModel
     */
    public function setSerializer(?SerializerConfigModel $serializer): AceMethodDetailModel
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * Get the value of logger
     * 
     * @return ?LoggerConfigModel
     */
    public function getLogger(): ?LoggerConfigModel
    {
        return $this->logger;
    }

    /**
     * Set the value of logger
     *
     * @param ?LoggerConfigModel $logger
     * 
     * @return AceMethodDetailModel
     */
    public function setLogger(?LoggerConfigModel $logger): AceMethodDetailModel
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * Get the value of httpClient
     * 
     * @return ?HttpClientConfigModel
     */
    public function getHttpClient(): ?HttpClientConfigModel
    {
        return $this->httpClient;
    }

    /**
     * Set the value of httpClient
     *
     * @param ?HttpClientConfigModel $httpClient
     * 
     * @return AceMethodDetailModel
     */
    public function setHttpClient(?HttpClientConfigModel $httpClient): AceMethodDetailModel
    {
        $this->httpClient = $httpClient;
        return $this;
    }
}