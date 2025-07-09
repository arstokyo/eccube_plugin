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

    /**
     * Get Model Resolver
     *
     * @return ModelResolver
     */
    public function getModelResolver(): ModelResolver;

    /**
     * Get ParameterBag
     *
     * @return ParameterBag
     */
    public function getParameterBag(): ParameterBag;
}
