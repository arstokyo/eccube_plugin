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
 * Trait for 金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait MoneyTrait
{
    /** @var ?float 金額 */
    protected ?float $money = null;

    /**
     * {@inheritDoc}
     */
    public function getMoney(): ?float
    {
        return $this->money;
    }

    /**
     * {@inheritDoc}
     */
    public function setMoney(?string $money)
    {
        $this->money = NumberConverter::stringWithCommaToFloat($money);

        return $this;
    }
}
