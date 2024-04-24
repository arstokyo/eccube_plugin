<?php

namespace Plugin\AceClient\Config\Model\AceMethod;

use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Plugin\AceClient\Config\Model\OverridableConfigAbstract;

/**
 * Ace Method Config Model
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class AceMethodModel extends OverridableConfigAbstract implements ConfigModelInterface
{
    /**
     * Get the value of default
     * 
     * @return AceMethodDetailModel
     */
    public function getDefaultConfig(): ConfigModelInterface
    {
        return parent::getDefaultConfig();
    }

    /**
     * Get a specific override value
     * 
     * @param string $classNameFQD
     * 
     * @return ?AceMethodDetailModel
     */
    public function getSpecificOverride(string $classNameFQD): ?ConfigModelInterface
    {
        return parent::getSpecificOverride($classNameFQD);
    }

    /**
     * Perform the override config
     * 
     * @param AceMethodDetailModel $targetConfig
     * 
     * @return ConfigModelInterface
     */
    protected function performOverrideConfig(ConfigModelInterface $targetConfig): ConfigModelInterface
    {
        return (new AceMethodDetailModel())
                ->setApiClient($this->performOverrideApiClient($targetConfig))
                ->setNormalizer($this->performOverrideNormalizer($targetConfig))
                ->setSerializer($this->performOverrideSerializer($targetConfig))
                ->setLogger($this->performOverrideLogger($targetConfig))
                ->setHttpClient($this->performOverrideHttpClient($targetConfig));
    }

    /**
     * Perform the override api client
     * 
     * @param AceMethodDetailModel $targetConfig
     * 
     * @return HttpClientConfigModel
     */
    private function performOverrideHttpClient(AceMethodDetailModel $targetConfig): HttpClientConfigModel
    {
        $overridedHttpClient = $targetConfig->getHttpClient();
        $defaultHttpClient = $this->getDefaultConfig()->getHttpClient();

        if (!$overridedHttpClient) {
            return $defaultHttpClient;
        }
        
        $resultHttpClient = new HttpClientConfigModel();
        if ($overridedHttpClient) {
            
            // Valiate and set the value of baseUri
            if ($overridedHttpClient->getBaseUri()) {
                $resultHttpClient->setBaseUri($overridedHttpClient->getBaseUri());
            } else 
            {
                $resultHttpClient->setBaseUri($defaultHttpClient->getBaseUri());
            } 

            // Valiate and set the value of clientName
            if ($overridedHttpClient->getClassName()) {
                $resultHttpClient->setClassName($overridedHttpClient->getClassName());
            } else 
            {
                $resultHttpClient->setClassName($defaultHttpClient->getClassName());
            }

            // Valiate and set the value of headers
            if ($overridedHttpClient->getHeaders()) {
                $resultHttpClient->setHeaders($overridedHttpClient->getHeaders());
            } else 
            {
                $resultHttpClient->setHeaders($defaultHttpClient->getHeaders());
            }

            // Valiate and set the value of options
            if ($overridedHttpClient->getOptions()) {
                $resultHttpClient->setOptions($overridedHttpClient->getOptions());
            } else 
            {
                if (array_key_exists('Content-Type', $defaultHttpClient->getHeaders()) &&
                    $defaultHttpClient->getHeaders()['Content-Type'] === ($overridedHttpClient->getHeaders()['Content-Type'] ?? ''))
                {
                    $resultHttpClient->setOptions($defaultHttpClient->getOptions());
                }
            }

        } 
        return $resultHttpClient ;
    }

    /**
     * Perform the override serializer
     * 
     * @param AceMethodDetailModel $targetConfig
     * 
     * @return SerializerConfigModel
     */
    private function performOverrideSerializer(AceMethodDetailModel $targetConfig): SerializerConfigModel
    {
        if (empty($targetConfig->getSerializer()) || empty($targetConfig->getSerializer()->getClassName())) {
            return $this->getDefaultConfig()->getSerializer();
        }
        return $targetConfig->getSerializer();
    }

    /**
     * Perform the override logger
     * 
     * @param AceMethodDetailModel $targetConfig
     * 
     * @return LoggerConfigModel
     */
    private function performOverrideLogger(AceMethodDetailModel $targetConfig): LoggerConfigModel
    {
        if (empty($targetConfig->getLogger()) || empty($targetConfig->getLogger()->getClassName())) {
            return $this->getDefaultConfig()->getLogger();
        }
        return $targetConfig->getLogger();
    }

    /**
     * Perform the override normalizer
     * 
     * @param AceMethodDetailModel $targetConfig
     * 
     * @return NormalizerConfigModel
     */
    private function performOverrideNormalizer(AceMethodDetailModel $targetConfig): NormalizerConfigModel
    {
        if (empty($targetConfig->getNormalizer()) || empty($targetConfig->getNormalizer()->getClassName())) {
            return $this->getDefaultConfig()->getNormalizer();
        }
        return $targetConfig->getNormalizer();
    }   

    /**
     * Perform the override http client
     * 
     * @param AceMethodDetailModel $targetConfig
     * 
     * @return ApiClientConfigModel
     */
    private function performOverrideApiClient(AceMethodDetailModel $targetConfig): ApiClientConfigModel
    {
        if (empty($targetConfig->getApiClient()) || empty($targetConfig->getApiClient()->getClassName())) {
            return $this->getDefaultConfig()->getApiClient();
        }
        return $targetConfig->getApiClient();
    }

    /**
     * {@inheritDoc}
     * 
     */
    protected function setDetailConfigClassName(): string
    {
        return AceMethodDetailModel::class;
    }
}