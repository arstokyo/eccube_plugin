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
 * Trait for Order ID
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait OrderIdTrait
{
    /**
     * Order ID
     *
     * @var string|null
     */
    protected ?string $orderid = null;

    /**
     * {@inheritDoc}
     */
    public function getOrderid(): ?string
    {
        return $this->orderid;
    }

    /**
     * {@inheritDoc}
     */
    public function setOrderid(?string $orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }
}
