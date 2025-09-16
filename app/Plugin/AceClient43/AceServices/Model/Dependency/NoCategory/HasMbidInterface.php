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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 顧客ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasMbidInterface
{
    /**
     * Get 顧客ID
     *
     * @return string
     */
    public function getMbid(): ?string;

    /**
     * Set 顧客ID
     *
     * @param string $mbid
     */
    public function setMbid(?string $mbid);
}
