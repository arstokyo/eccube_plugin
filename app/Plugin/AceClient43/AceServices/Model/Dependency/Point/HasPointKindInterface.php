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
 * Interface for Has ポイント種類
 *
 * @author kmorino
 */
interface HasPointKindInterface
{
    /**
     * Get ポイント種類
     *
     * @return ?int
     */
    public function getPointkind(): ?int;

    /**
     * Set ポイント種類
     *
     * @param ?int $pointkind
     *
     * @return $this
     */
    public function setPointkind(?int $pointkind);
}
