<?php

namespace Plugin\AceClient\Config\Model\AceMethod;

use Plugin\AceClient\Config\Model\ConfigModelInterface;
use Plugin\AceClient\Config\Model\OverridableConfigAbstract;

use function PHPSTORM_META\override;

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
                ->setLogger($this->performOverrideLogger($targetConfig));
    }

    /**
     * Perform the override api client
     * 
     * @param AceMethodDetailModel $targetConfig
     * 
     * @return ApiClientConfigModel
     */
    private function performOverrideApiClient(AceMethodDetailModel $targetConfig): ApiClientConfigModel
    {
        $overridedApiClient = $targetConfig->getApiClient();
        $defaultApiClient = $this->getDefaultConfig()->getApiClient();

        if (!$overridedApiClient) {
            return $defaultApiClient;
        }
        
        $resultApiClient = new ApiClientConfigModel();
        if ($overridedApiClient) {
            
            // Valiate and set the value of baseUri
            if ($overridedApiClient->getBaseUri()) {
                $resultApiClient->setBaseUri($overridedApiClient->getBaseUri());
            } else 
            {
                $resultApiClient->setBaseUri($defaultApiClient->getBaseUri());
            } 

            // Valiate and set the value of clientName
            if ($overridedApiClient->getClientName()) {
                $resultApiClient->setClientName($overridedApiClient->getClientName());
            } else 
            {
                $resultApiClient->setClientName($defaultApiClient->getClientName());
            }

            // Valiate and set the value of headers
            if ($overridedApiClient->getHeaders()) {
                $resultApiClient->setHeaders($overridedApiClient->getHeaders());
            } else 
            {
                $resultApiClient->setHeaders($defaultApiClient->getHeaders());
            }

            // Valiate and set the value of options
            if ($overridedApiClient->getOptions()) {
                $resultApiClient->setOptions($overridedApiClient->getOptions());
            } else 
            {
                if ($defaultApiClient->getHeaders()['Content-Type'] === ($overridedApiClient->getHeaders()['Content-Type'] ?? ''))
                {
                    $resultApiClient->setOptions($defaultApiClient->getOptions());
                }
            }

        } 
        return $resultApiClient ;
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
     * {@inheritDoc}
     * 
     */
    protected function setDetailConfigClassName(): string
    {
        return AceMethodDetailModel::class;
    }
}