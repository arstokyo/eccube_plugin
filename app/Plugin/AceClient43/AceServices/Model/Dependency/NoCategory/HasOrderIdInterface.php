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
 * Interface for Has Order ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasOrderIdInterface
{
    /**
     * Get Order ID
     *
     * @return string|null
     */
    public function getOrderid(): ?string;

    /**
     * Set Order ID
     *
     * @param string|null $orderid
     *
     * @return $this
     */
    public function setOrderid(?string $orderid);
}
