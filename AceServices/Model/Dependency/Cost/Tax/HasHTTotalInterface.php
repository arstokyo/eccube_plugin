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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 非課税対象額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasHTTotalInterface
{
    /**
     * Get 非課税対象額
     *
     * @return float|null
     */
    public function getHttotal(): ?float;

    /**
     * Set 非課税対象額
     *
     * @param string|null $httotal
     *
     * @return $this
     */
    public function setHttotal(?string $httotal);
}
