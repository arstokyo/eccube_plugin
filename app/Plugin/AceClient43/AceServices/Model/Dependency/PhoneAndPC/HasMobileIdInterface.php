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

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface for Has 携帯固有ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMobileIdInterface
{
    /**
     * Get 携帯固有ID
     *
     * @return ?string
     */
    public function getMobileId(): ?string;

    /**
     * Set 携帯固有ID
     *
     * @param ?string $mobileId
     *
     * @return $this
     */
    public function setMobileId(?string $mobileId);
}
