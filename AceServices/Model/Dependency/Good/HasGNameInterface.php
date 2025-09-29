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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 商品名
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasGNameInterface
{
    /**
     * Get 商品名
     *
     * @return ?string
     */
    public function getGname(): ?string;

    /**
     * Set 商品名
     *
     * @param ?string $gname
     *
     * @return $this
     */
    public function setGname(?string $gname);
}
