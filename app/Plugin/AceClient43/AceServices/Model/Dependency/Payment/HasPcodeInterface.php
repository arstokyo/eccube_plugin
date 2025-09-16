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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Payment;

/**
 * Interface for Has 支払予定方法コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPcodeInterface
{
    /**
     * Get 支払予定方法コード
     *
     * @return ?int
     */
    public function getPcode(): ?int;

    /**
     * Set 支払予定方法コード
     *
     * @param ?int $pcode
     *
     * @return $this
     */
    public function setPcode(?int $pcode);
}
