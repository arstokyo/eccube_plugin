<?php

namespace Plugin\AceClient43\Util\ServiceRetriever;

use Plugin\AceClient43\Repository\ConfigRepository;
use Doctrine\ORM\EntityManagerInterface;
use Eccube\Common\EccubeConfig;
use Plugin\AceClient43\Util\Serializer\AceConfigSerializer;
use Plugin\AceClient43\Util\Serializer\SoapXmlSerializerProvider;
use Plugin\AceClient43\Util\Logger\LoggerProvider;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Interface for ServiceRetriever
 * 
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface ServiceRetrieverInterface
{
     /**
     * Get the config repository.
     * 
     * @return ConfigRepository
     */
    public function getConfigRepository(): ConfigRepository;

    /**
     * Get the entity manager.
     * 
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface;

    /**
     * Get the eccube config.
     * 
     * @return EccubeConfig
     */
    public function getEccubeConfig(): EccubeConfig;

    /**
     * Get the AceConfigSerializer.
     * 
     * @return AceConfigSerializer
     */
    public function getAceConfigSerializer(): AceConfigSerializer;

    /**
     * Get SoapXml Provider.
     * 
     * @return SoapXmlSerializerProvider
     */
    public function getSoapXmlProvider(): SoapXmlSerializerProvider;

    /**
     * Get Logger Provider.
     * 
     * @return LoggerProvider
     */
    public function getLoggerProvider(): LoggerProvider;

    /**
     * Get Normalizer
     * 
     * @return NormalizerInterface
     */
    public function getNormalizer(): NormalizerInterface;
    
}