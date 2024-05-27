<?php

namespace Plugin\AceClient\Util\ServiceRetriever;

use Plugin\AceClient\Repository\ConfigRepository;
use Doctrine\ORM\EntityManagerInterface;
use Eccube\Common\EccubeConfig;
use Plugin\AceClient\Util\Serializer\AceConfigSerializer;
use Plugin\AceClient\Util\Serializer\SoapXmlSerializerProvider;
use Plugin\AceClient\Util\Logger\LoggerProvider;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Retriever for all services.
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ServiceRetriever implements ServiceRetrieverInterface
{

    /**
     * ServiceRetriveHelper constructor.
     * 
     * @param ConfigRepositoryRetriever $configRepositoryRetriever
     * @param EccubeConfigRetriever $eccubeConfigRetriever
     * @param AceConfigSerializerRetriever $aceConfigSerializerRetriever
     * @param ApiComponentRetriever $apiComponentRetriever
     */
    public function __construct(
        private ConfigRepositoryRetriever $configRepositoryRetriever,
        private EccubeConfigRetriever $eccubeConfigRetriever,
        private AceConfigSerializerRetriever $aceConfigSerializerRetriever,
        private ApiComponentRetriever $apiComponentRetriever
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getConfigRepository(): ConfigRepository
    {
        return $this->configRepositoryRetriever->getConfigRepository();
    }

    /**
     * {@inheritDoc}
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->configRepositoryRetriever->getEntityManager();
    }

    /**
     * {@inheritDoc}
     */
    public function getEccubeConfig(): EccubeConfig
    {
        return $this->eccubeConfigRetriever->getEccubeConfig();
    }

    /**
     * {@inheritDoc}
     */
    public function getAceConfigSerializer(): AceConfigSerializer
    {
        return $this->aceConfigSerializerRetriever->getAceConfigSerializer();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getSoapXmlProvider(): SoapXmlSerializerProvider
    {
        return $this->apiComponentRetriever->getSoapXmlProvider();
    }

    /**
     * {@inheritDoc}
     */
    public function getLoggerProvider(): LoggerProvider
    {
        return $this->apiComponentRetriever->getLoggerProvider();
    }

    /**
     * {@inheritDoc}
     */
    public function getNormalizer(): NormalizerInterface
    {
        return $this->apiComponentRetriever->getNormalizer();
    }

}