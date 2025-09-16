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
 * Interface for Has 区分
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasKbnInterface
{
    /**
     * Get 区分
     *
     * @return ?int
     */
    public function getKbn(): ?int;

    /**
     * Set 区分
     *
     * @param ?int $kbn
     *
     * @return $this
     */
    public function setKbn(?int $kbn);
}
