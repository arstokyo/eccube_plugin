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
 * Trait for 伝票種別
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait DensyuTrait
{
    /** @var ?int 伝票種別 */
    protected ?int $densyu = null;

    /**
     * {@inheritDoc}
     */
    public function getDensyu(): ?int
    {
        return $this->densyu;
    }

    /**
     * {@inheritDoc}
     */
    public function setDensyu(?int $densyu)
    {
        $this->densyu = $densyu;

        return $this;
    }
}
