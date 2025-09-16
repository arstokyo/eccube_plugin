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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Check for Has 配送時間ID
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
interface HasHkCodeInterface
{
    /**
     * Get 配送時間ID
     *
     * @return ?int
     */
    public function getHkcode(): ?int;

    /**
     * Set 配送時間ID
     *
     * @param ?int $hkcode
     *
     * @return $this
     */
    public function setHkcode(?int $hkcode);
}
