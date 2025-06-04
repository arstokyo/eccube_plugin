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

namespace Plugin\AceClient43\Util\Denormalizer\OTD;

/**
 * Interface for Object To Data Denormalizer.
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface OTDDenormalizerInterface
{
    /**
     * Denormalizes the given data
     *
     * @return string|object|null
     */
    public function denormalizeOTD();

    /**
     * Get Delegate
     *
     * @return OTDDelegateInterface
     */
    public function getDelegate(): OTDDelegateInterface;
}
