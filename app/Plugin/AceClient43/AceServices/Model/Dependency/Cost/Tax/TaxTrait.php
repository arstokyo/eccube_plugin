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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 外税消費税
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTrait
{
    /** @var ?float 消費税 */
    protected ?float $tax = null;

    /**
     * {@inheritDoc}
     */
    public function getTax(): ?float
    {
        return $this->tax;
    }

    /**
     * {@inheritDoc}
     */
    public function setTax(?string $tax)
    {
        $this->tax = NumberConverter::stringWithCommaToFloat($tax);

        return $this;
    }
}
