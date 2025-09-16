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
 * Interface for Has 商品合計額
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasGtotalInterface
{
    /**
     * Get the 商品合計額.
     *
     * @return ?float The 商品合計額.
     */
    public function getGtotal(): ?float;

    /**
     * Set the 商品合計額.
     *
     * @param ?string $gtotal The 商品合計額.
     *
     * @return $this
     */
    public function setGtotal(?string $gtotal);
}
