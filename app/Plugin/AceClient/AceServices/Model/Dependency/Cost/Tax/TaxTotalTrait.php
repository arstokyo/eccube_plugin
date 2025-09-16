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
 * Trait for taxtotal
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTotalTrait
{
    /** @var ?float 消費税合計 */
    protected ?float $taxtotal = null;

    /**
     * {@inheritDoc}
     */
    public function getTaxtotal(): ?float
    {
        return $this->taxtotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxtotal(?string $taxtotal)
    {
        $this->taxtotal = NumberConverter::stringWithCommaToFloat($taxtotal);

        return $this;
    }
}
