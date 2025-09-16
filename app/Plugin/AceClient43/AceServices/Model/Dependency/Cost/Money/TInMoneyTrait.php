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
 * Trait for 税込み金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TInMoneyTrait
{
    /** @var ?float 税込み金額 */
    protected ?float $tinmoney = null;

    /**
     * {@inheritDoc}
     */
    public function getTinmoney(): ?float
    {
        return $this->tinmoney;
    }

    /**
     * {@inheritDoc}
     */
    public function setTinmoney(?string $tinmoney)
    {
        $this->tinmoney = NumberConverter::stringWithCommaToFloat($tinmoney);

        return $this;
    }
}
