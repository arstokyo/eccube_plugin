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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bumon;

/**
 * Interface for Has 部門
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBumonInterface
{
    /**
     * Get 部門
     *
     * @return string|null
     */
    public function getBumon(): ?string;

    /**
     * Set 部門
     *
     * @param string|null $bumon
     *
     * @return $this
     */
    public function setBumon(?string $bumon);
}
