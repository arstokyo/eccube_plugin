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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 伝票種別
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasDensyuInterface
{
    /**
     * Get 伝票種別
     *
     * @return ?int
     */
    public function getDensyu(): ?int;

    /**
     * Set 伝票種別
     *
     * @param ?int $densyu
     *
     * @return $this
     */
    public function setDensyu(?int $densyu);
}
