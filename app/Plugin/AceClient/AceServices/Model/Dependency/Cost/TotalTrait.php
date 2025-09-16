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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for 合計額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TotalTrait
{
    /** @var ?float 合計額 */
    protected ?float $total = null;

    /**
     * {@inheritDoc}
     */
    public function getTotal(): ?float
    {
        return $this->total;
    }

    /**
     * {@inheritDoc}
     */
    public function setTotal(?string $total)
    {
        $this->total = NumberConverter::stringWithCommaToFloat($total);

        return $this;
    }
}
