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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost;

/**
 * Interface for 外税対象額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTTotalInterface
{
    /**
     * Get 外税対象額
     *
     * @return float|null
     */
    public function getTtotal(): ?float;

    /**
     * Set 外税対象額
     *
     * @param string|null $ttotal
     *
     * @return $this
     */
    public function setTtotal(?string $ttotal);
}
