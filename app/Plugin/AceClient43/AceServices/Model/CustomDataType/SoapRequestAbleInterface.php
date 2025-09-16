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

namespace Plugin\AceClient43\AceServices\Model\CustomDataType;

/**
 * Interface SoapRequestAbleInterface
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface SoapRequestAbleInterface
{
    /**
     * Fetch Request Node Name when decode to XML
     *
     * @return string
     */
    public function fetchRequestNodeName(): string;
}
