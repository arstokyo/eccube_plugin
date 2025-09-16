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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 顧客用ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMemIdInterface
{
    /**
     * Get 顧客用ID
     *
     * @return ?int
     */
    public function getMemid(): ?int;

    /**
     * Set 顧客用ID
     *
     * @param int|null $memid
     *
     * @return $this
     */
    public function setMemid(?int $memid);
}
