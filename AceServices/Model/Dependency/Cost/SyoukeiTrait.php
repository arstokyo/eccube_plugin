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
 * Trait for 小計
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SyoukeiTrait
{
    /** @var ?float 小計 */
    protected ?float $syoukei = null;

    /**
     * {@inheritDoc}
     */
    public function getSyoukei(): ?float
    {
        return $this->syoukei;
    }

    /**
     * {@inheritDoc}
     */
    public function setSyoukei(?string $syoukei)
    {
        $this->syoukei = NumberConverter::stringWithCommaToFloat($syoukei);

        return $this;
    }
}
