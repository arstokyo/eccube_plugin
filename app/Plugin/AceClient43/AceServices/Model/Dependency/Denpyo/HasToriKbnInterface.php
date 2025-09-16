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
 * Interface for Has 取引区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasToriKbnInterface
{
    /**
     * Get 取引区分
     *
     * @return ?int
     */
    public function getTorikbn(): ?int;

    /**
     * Set 取引区分
     *
     * @param ?int $torikbn
     *
     * @return $this
     */
    public function setTorikbn(?int $torikbn);
}
