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
 * Interface for Has 合計額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTotalInterface
{
    /**
     * Get 合計額
     *
     * @return ?float
     */
    public function getTotal(): ?float;

    /**
     * Set 合計額
     *
     * @param string|null $total
     *
     * @return $this
     */
    public function setTotal(?string $total);
}
