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
 * Trait for 内消費税
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait UtaxTrait
{
    /** @var ?float 内消費税 */
    protected ?float $utax = null;

    /**
     * {@inheritDoc}
     */
    public function getUtax(): ?float
    {
        return $this->utax;
    }

    /**
     * {@inheritDoc}
     */
    public function setUtax(?string $utax)
    {
        $this->utax = NumberConverter::stringWithCommaToFloat($utax);

        return $this;
    }
}
