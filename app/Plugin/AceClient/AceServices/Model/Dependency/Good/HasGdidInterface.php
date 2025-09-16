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
 * Interface for Has 商品ID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasGdidInterface
{
    /**
     * Get 商品ID
     *
     * @return ?string
     */
    public function getGdid(): ?string;

    /**
     * Set 商品ID
     *
     * @param ?string $gdid
     *
     * @return $this
     */
    public function setGdid(?string $gdid);
}
