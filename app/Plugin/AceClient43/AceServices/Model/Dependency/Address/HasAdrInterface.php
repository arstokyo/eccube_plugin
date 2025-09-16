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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Address;

/**
 * Interface for Has 住所
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasAdrInterface
{
    /**
     * Get 住所
     *
     * @return ?string
     */
    public function getAdr(): ?string;

    /**
     * Set 住所
     *
     * @param ?string $adr
     *
     * @return $this
     */
    public function setAdr(?string $adr);
}
