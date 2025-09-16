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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for 数量
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSuuInterface
{
    /**
     * Get 数量
     *
     * @return int|null
     */
    public function getSuu(): ?int;

    /**
     * Set 数量
     *
     * @param int|null $suu
     *
     * @return $this
     */
    public function setSuu(?int $suu);
}
