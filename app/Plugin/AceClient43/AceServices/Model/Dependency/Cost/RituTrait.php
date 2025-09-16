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
 * Trait for 掛け率
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait RituTrait
{
    /** @var float|null 掛け率 */
    protected ?float $ritu = null;

    /**
     * {@inheritDoc}
     */
    public function getRitu(): ?float
    {
        return $this->ritu;
    }

    /**
     * {@inheritDoc}
     */
    public function setRitu(?string $ritu)
    {
        $this->ritu = NumberConverter::stringWithCommaToFloat($ritu);

        return $this;
    }
}
