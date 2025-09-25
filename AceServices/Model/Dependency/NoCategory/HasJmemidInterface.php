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
 * Interface for Has 受注顧客ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasJmemidInterface
{
    /**
     * Get 受注顧客ID
     *
     * @return ?string
     */
    public function getJmemid(): ?string;

    /**
     * Set 受注顧客ID
     *
     * @param ?string $jmemid
     *
     * @return $this
     */
    public function setJmemid(?string $jmemid);
}
