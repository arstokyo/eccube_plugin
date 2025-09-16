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
 * Interface for Has 支払予定方法
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasPnameInterface
{
    /**
     * Get 支払予定方法
     *
     * @return ?string
     */
    public function getPname(): ?string;

    /**
     * Set 支払予定方法
     *
     * @param ?string $pname
     *
     * @return $this
     */
    public function setPname(?string $pname);
}
