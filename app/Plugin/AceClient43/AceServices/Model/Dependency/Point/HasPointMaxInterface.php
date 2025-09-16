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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

/**
 * Interface for ポイント使用上限金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPointMaxInterface
{
    /**
     * Get ポイント使用上限金額
     *
     * @return int|null
     */
    public function getPointmax(): ?int;

    /**
     * Set ポイント使用上限金額
     *
     * @param int|null $pointmax
     *
     * @return $this
     */
    public function setPointmax(?int $pointmax);
}
