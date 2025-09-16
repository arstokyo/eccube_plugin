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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Money;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 消費税金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxMoneyTrait
{
    /** @var ?float 消費税金額 */
    protected ?float $taxmoney = null;

    /**
     * {@inheritDoc}
     */
    public function getTaxmoney(): ?float
    {
        return $this->taxmoney;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxmoney(?string $taxmoney)
    {
        $this->taxmoney = NumberConverter::stringWithCommaToFloat($taxmoney);

        return $this;
    }
}
