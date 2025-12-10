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
 * Trait for Pcode
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PcodeTrait
{
    /** @var ?int 支払予定方法コード */
    protected ?int $pcode = null;

    /**
     * {@inheritDoc}
     */
    public function getPcode(): ?int
    {
        return $this->pcode;
    }

    /**
     * {@inheritDoc}
     */
    public function setPcode(?int $pcode)
    {
        $this->pcode = $pcode;

        return $this;
    }

    public function hasPcode(): bool
    {
        return (int) $this->pcode > 0;
    }
}
