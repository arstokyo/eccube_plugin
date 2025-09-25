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
 * Interface for Has 加算ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPointPInterface
{
    /**
     * Get 加算ポイント
     *
     * @return ?int
     */
    public function getPointp(): ?int;

    /**
     * Set 加算ポイント
     *
     * @param ?int $pointp
     *
     * @return $this
     */
    public function setPointp(?int $pointp);
}
