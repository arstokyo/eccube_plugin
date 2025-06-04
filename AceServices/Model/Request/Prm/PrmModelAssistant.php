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

namespace Plugin\AceClient43\AceServices\Model\Request\Prm;

use Plugin\AceClient43\AceConfig\Model\PrmFormat\PrmDetailFormatModel;
use Plugin\AceClient43\Util\ConfigLoader\PrmOTDFormatConfigLoaderTrait;
use Plugin\AceClient43\Util\Denormalizer\OTD;

/**
 * Assistant for PrmModel.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
class PrmModelAssistant implements PrmModelAssistantInterface
{
    use PrmOTDFormatConfigLoaderTrait;
    /**
     * @var OTD\OTDDenormalizerInterface
     */
    private OTD\OTDDenormalizerInterface $OTDDenomarlizer;

    /**
     * @var PrmDetailFormatModel
     */
    private PrmDetailFormatModel $config;

    /**
     * Constructor.
     *
     * @param string $className
     * @param string $xmlRootNodeName
     * @param array $denomalizeOptions
     */
    public function __construct(string $className)
    {
        $this->config = $this->loadConfig()->getOverridedConfig($className);
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig(): PrmDetailFormatModel
    {
        return $this->config;
    }

    /**
     * {@inheritDoc}
     */
    public function getOTDDenormarlizer(): OTD\OTDDenormalizerInterface
    {
        return $this->OTDDenomarlizer;
    }

    /**
     * {@inheritDoc}
     */
    public function setOTDDenormalizer(OTD\OTDDenormalizerInterface $denormalizer): void
    {
        $this->OTDDenomarlizer = $denormalizer;
    }
}
