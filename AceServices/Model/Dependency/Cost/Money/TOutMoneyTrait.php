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
 * Trait for 税抜き金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TOutMoneyTrait
{
    /** @var ?float 税抜き金額 */
    protected ?float $toutmoney = null;

    /**
     * {@inheritDoc}
     */
    public function getToutmoney(): ?float
    {
        return $this->toutmoney;
    }

    /**
     * {@inheritDoc}
     */
    public function setToutmoney(?string $toutmoney)
    {
        $this->toutmoney = NumberConverter::stringWithCommaToFloat($toutmoney);

        return $this;
    }
}
