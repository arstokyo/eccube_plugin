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
 * Trait for 消費税額(外税)
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait StaxTrait
{
    /** @var ?float 消費税額(外税) */
    protected ?float $stax = null;

    /**
     * {@inheritDoc}
     */
    public function getStax(): ?float
    {
        return $this->stax;
    }

    /**
     * {@inheritDoc}
     */
    public function setStax(?string $stax)
    {
        $this->stax = NumberConverter::stringWithCommaToFloat($stax);

        return $this;
    }
}
