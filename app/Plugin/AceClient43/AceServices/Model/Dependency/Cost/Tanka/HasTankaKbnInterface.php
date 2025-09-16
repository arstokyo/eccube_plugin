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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Interface for 単価区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTankaKbnInterface
{
    /**
     * Get 単価区分
     *
     * @return int|null
     */
    public function getTankakbn(): ?int;

    /**
     * Set 単価区分
     *
     * @param int|null $tankakbn
     *
     * @return $this
     */
    public function setTankakbn(?int $tankakbn);
}
