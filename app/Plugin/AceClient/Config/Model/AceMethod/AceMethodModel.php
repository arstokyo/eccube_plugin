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
     * @param AceMethodDetailModel $overrideTarget
     * 
     * @return ConfigModelInterface
     */
    protected function performOverrideConfig(ConfigModelInterface $overrideTarget): ConfigModelInterface
    {
        return (new AceMethodDetailModel())
                ->setApiClient($this->performOverrideApiClient($overrideTarget))
                ->setNormalizer($this->performOverrideNormalizer($overrideTarget))
                ->setSerializer($this->performOverrideSerializer($overrideTarget))
                ->setLogger($this->performOverrideLogger($overrideTarget))
                ->setHttpClient($this->performOverrideHttpClient($overrideTarget));
    }

    /**
     * Perform the override api client
     * 
     * @param AceMethodDetailModel $overrideTarget
     * 
     * @return HttpClientConfigModel
     */
    private function performOverrideHttpClient(AceMethodDetailModel $overrideTarget): HttpClientConfigModel
    {
        $overridedHttpClient = $overrideTarget->getHttpClient();
        $defaultHttpClient = $this->getDefaultConfig()->getHttpClient();

        if (!$overridedHttpClient) {
            return $defaultHttpClient;
        }
        
        $finalHttpClient = new HttpClientConfigModel();
        if ($overridedHttpClient) {
            
            // Valiate and set the value of baseUri
            if ($overridedHttpClient->getBaseUri()) {
                $finalHttpClient->setBaseUri($overridedHttpClient->getBaseUri());
            } else 
            {
                $finalHttpClient->setBaseUri($defaultHttpClient->getBaseUri());
            } 

            // Valiate and set the value of clientName
            if ($overridedHttpClient->getClassName()) {
                $finalHttpClient->setClassName($overridedHttpClient->getClassName());
            } else 
            {
                $finalHttpClient->setClassName($defaultHttpClient->getClassName());
            }

            // Valiate and set the value of headers
            if ($overridedHttpClient->getHeaders()) {
                $finalHttpClient->setHeaders($overridedHttpClient->getHeaders());
            } else 
            {
                $finalHttpClient->setHeaders($defaultHttpClient->getHeaders());
            }

            // Valiate and set the value of options
            if ($overridedHttpClient->getOptions()) {
                $finalHttpClient->setOptions($overridedHttpClient->getOptions());
            } else 
            {
                if (array_key_exists('Content-Type', $defaultHttpClient->getHeaders()) &&
                    $defaultHttpClient->getHeaders()['Content-Type'] === ($overridedHttpClient->getHeaders()['Content-Type'] ?? ''))
                {
                    $finalHttpClient->setOptions($defaultHttpClient->getOptions());
                }
            }

        } 
        return $finalHttpClient ;
    }

    /**
     * Perform the override serializer
     * 
     * @param AceMethodDetailModel $overrideTarget
     * 
     * @return SerializerConfigModel
     */
    private function performOverrideSerializer(AceMethodDetailModel $overrideTarget): SerializerConfigModel
    {
        $overridedSerializer = $overrideTarget->getSerializer();
        $defaultSerializer = $this->getDefaultConfig()->getSerializer();

        if (!$overridedSerializer) {
            return $defaultSerializer;
        }

        $finalSerializer = new SerializerConfigModel();
        if (!$overridedSerializer->getClassName()) {
            $finalSerializer->setClassName($defaultSerializer->getClassName());
        } else {
            $finalSerializer->setClassName($overridedSerializer->getClassName());
        }

        if (!$overridedSerializer->getNormalizers()) {
            $finalSerializer->setNormalizers($defaultSerializer->getNormalizers());
        } else {
            $finalSerializer->setNormalizers($overridedSerializer->getNormalizers());
        }


        if (!$overridedSerializer->getEncoder()) {
            $finalSerializer->setEncoder($defaultSerializer->getEncoder());
        } else {
            $finalSerializer->setEncoder($overridedSerializer->getEncoder());
        }

        return $finalSerializer;
    }

    /**
     * Perform the override logger
     * 
     * @param AceMethodDetailModel $overrideTarget
     * 
     * @return LoggerConfigModel
     */
    private function performOverrideLogger(AceMethodDetailModel $overrideTarget): LoggerConfigModel
    {
        if (empty($overrideTarget->getLogger()) || empty($overrideTarget->getLogger()->getClassName())) {
            return $this->getDefaultConfig()->getLogger();
        }
        return $overrideTarget->getLogger();
    }

    /**
     * Perform the override normalizer
     * 
     * @param AceMethodDetailModel $overrideTarget
     * 
     * @return NormalizerConfigModel
     */
    private function performOverrideNormalizer(AceMethodDetailModel $overrideTarget): NormalizerConfigModel
    {
        if (empty($overrideTarget->getNormalizer()) || empty($overrideTarget->getNormalizer()->getClassName())) {
            return $this->getDefaultConfig()->getNormalizer();
        }
        return $overrideTarget->getNormalizer();
    }   

    /**
     * Perform the override http client
     * 
     * @param AceMethodDetailModel $overrideTarget
     * 
     * @return ApiClientConfigModel
     */
    private function performOverrideApiClient(AceMethodDetailModel $overrideTarget): ApiClientConfigModel
    {
        if (empty($overrideTarget->getApiClient()) || empty($overrideTarget->getApiClient()->getClassName())) {
            return $this->getDefaultConfig()->getApiClient();
        }
        return $overrideTarget->getApiClient();
    }

    /**
     * {@inheritDoc}
     */
    protected function setDetailConfigClassName(): string
    {
        return AceMethodDetailModel::class;
    }
}