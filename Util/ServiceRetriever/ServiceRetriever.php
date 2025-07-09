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
use Plugin\AceClient43\Util\ModelResolver\ModelResolver;
use Plugin\AceClient43\Util\Serializer\AceConfigSerializer;
use Plugin\AceClient43\Util\Serializer\SoapXmlSerializerProvider;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
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

    private ModelResolver $modelResolver;

    private ParameterBagInterface $parameterBag;

    /**
     * ServiceRetrieveHelper constructor.
     *
     * @param ConfigRepositoryRetriever $configRepositoryRetriever
     * @param EccubeConfigRetriever $eccubeConfigRetriever
     * @param AceConfigSerializerRetriever $aceConfigSerializerRetriever
     * @param ApiComponentRetriever $apiComponentRetriever
     * @param ModelResolver $modelResolver
     * @param ParameterBagInterface $parameterBag
     */
    public function __construct(
        ConfigRepositoryRetriever $configRepositoryRetriever,
        EccubeConfigRetriever $eccubeConfigRetriever,
        AceConfigSerializerRetriever $aceConfigSerializerRetriever,
        ApiComponentRetriever $apiComponentRetriever,
        ModelResolver $modelResolver,
        ParameterBagInterface $parameterBag,
    ) {
        $this->configRepositoryRetriever = $configRepositoryRetriever;
        $this->eccubeConfigRetriever = $eccubeConfigRetriever;
        $this->aceConfigSerializerRetriever = $aceConfigSerializerRetriever;
        $this->apiComponentRetriever = $apiComponentRetriever;
        $this->modelResolver = $modelResolver;
        $this->parameterBag = $parameterBag;
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

    /**
     * {@inheritDoc}
     */
    public function getModelResolver(): ModelResolver
    {
        return $this->modelResolver;
    }

    /**
     * {@inheritDoc}
     */
    public function getParameterBag(): ParameterBag
    {
        return $this->parameterBag;
    }
}
