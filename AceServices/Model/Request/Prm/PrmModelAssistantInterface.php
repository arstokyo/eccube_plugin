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
use Plugin\AceClient43\Util\Denormalizer\OTD;

/**
 * Interface for PrmModelAssistant.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface PrmModelAssistantInterface
{
    /**
     * Get config
     *
     * @return PrmDetailFormatModel
     */
    public function getConfig(): PrmDetailFormatModel;

    /**
     * Get OTD Denormalizer
     *
     * @return OTD\OTDDenormalizerInterface
     */
    public function getOTDDenormarlizer(): OTD\OTDDenormalizerInterface;

    /**
     * Set OTD Denormalizer
     *
     * @param OTD\OTDDenormalizerInterface $denormalizer
     *
     * @return void
     */
    public function setOTDDenormalizer(OTD\OTDDenormalizerInterface $denormalizer): void;
}
