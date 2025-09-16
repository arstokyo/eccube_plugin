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
 * Interface for Has 使用ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPointMInterface
{
    /**
     * Get 使用ポイント
     *
     * @return ?int
     */
    public function getPointm(): ?int;

    /**
     * Set 使用ポイント
     *
     * @param ?int $pointm
     *
     * @return $this
     */
    public function setPointm(?int $pointm);
}
