<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\AceClient43\Util\ServiceRetriever;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Common\EccubeConfig;
use Plugin\AceClient43\Repository\ConfigRepository;
use Plugin\AceClient43\Util\Logger\LoggerProvider;
use Plugin\AceClient43\Util\Serializer\AceConfigSerializer;
use Plugin\AceClient43\Util\Serializer\SoapXmlSerializerProvider;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Retriever for all services.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class ServiceRetriever implements ServiceRetrieverInterface
{
    private ConfigRepositoryRetriever $configRepositoryRetriever;
    private EccubeConfigRetriever $eccubeConfigRetriever;
    private AceConfigSerializerRetriever $aceConfigSerializerRetriever;
    private ApiComponentRetriever $apiComponentRetriever;

    /**
     * ServiceRetriveHelper constructor.
     *
     * @param ConfigRepositoryRetriever $configRepositoryRetriever
     * @param EccubeConfigRetriever $eccubeConfigRetriever
     * @param AceConfigSerializerRetriever $aceConfigSerializerRetriever
     * @param ApiComponentRetriever $apiComponentRetriever
     */
    public function __construct(
        ConfigRepositoryRetriever $configRepositoryRetriever,
        EccubeConfigRetriever $eccubeConfigRetriever,
        AceConfigSerializerRetriever $aceConfigSerializerRetriever,
        ApiComponentRetriever $apiComponentRetriever,
    ) {
        $this->configRepositoryRetriever = $configRepositoryRetriever;
        $this->eccubeConfigRetriever = $eccubeConfigRetriever;
        $this->aceConfigSerializerRetriever = $aceConfigSerializerRetriever;
        $this->apiComponentRetriever = $apiComponentRetriever;
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
