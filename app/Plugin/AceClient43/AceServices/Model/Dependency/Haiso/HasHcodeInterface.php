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
 * Interface for Has 配送方法コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHcodeInterface
{
    /**
     * Get 配送方法コード
     *
     * @return ?int
     */
    public function getHcode(): ?int;

    /**
     * Set 配送方法コード
     *
     * @param ?int $hcode
     *
     * @return $this
     */
    public function setHcode(?int $hcode);
}
