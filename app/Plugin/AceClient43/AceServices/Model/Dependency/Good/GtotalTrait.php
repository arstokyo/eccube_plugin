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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for Gtotal
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GtotalTrait
{
    /** @var ?float 商品合計額 */
    protected ?float $gtotal = null;

    /**
     * {@inheritDoc}
     */
    public function getGtotal(): ?float
    {
        return $this->gtotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setGtotal(?string $gtotal)
    {
        $this->gtotal = NumberConverter::stringWithCommaToFloat($gtotal);

        return $this;
    }
}
