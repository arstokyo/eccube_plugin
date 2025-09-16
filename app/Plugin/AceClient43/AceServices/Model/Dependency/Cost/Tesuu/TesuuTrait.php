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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tesuu;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for Tesuu
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait TesuuTrait
{
    /** @var ?float 手数料 */
    protected ?float $tesuu = null;

    /**
     * {@inheritDoc}
     */
    public function getTesuu(): ?float
    {
        return $this->tesuu;
    }

    /**
     * {@inheritDoc}
     */
    public function setTesuu(?string $tesuu)
    {
        $this->tesuu = NumberConverter::stringWithCommaToFloat($tesuu);

        return $this;
    }
}
