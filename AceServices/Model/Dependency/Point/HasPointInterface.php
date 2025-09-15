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
 * Interface for Has ポイント
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasPointInterface
{
    /**
     * Get ポイント
     *
     * @return int|null
     */
    public function getPoint(): ?int;

    /**
     * Set ポイント
     *
     * @param int|null $point
     *
     * @return $this
     */
    public function setPoint(?int $point);

    public function getPointAsString(): ?string;
}
