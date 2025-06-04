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
 * Interface for ポイント掛率
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPointRituInterface
{
    /**
     * Get ポイント掛率
     *
     * @return float|null
     */
    public function getPointritu(): ?float;

    /**
     * Set ポイント掛率
     *
     * @param string|null $pointritu
     *
     * @return $this
     */
    public function setPointritu(?string $pointritu);
}
