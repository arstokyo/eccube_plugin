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

namespace Plugin\AceClient43\Util\Serializer;

use Plugin\AceClient43\AceConfig\Model\SoapXmlSerializer\SoapXmlSerializerModel;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Interface for Soap Serializer.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface SoapXmlSerializerInterface extends SerializerInterface
{
    /**
     * Get the config of the Soap Serializer.
     *
     * @return SoapXmlSerializerModel
     */
    public function getConfig(): SoapXmlSerializerModel;
}
