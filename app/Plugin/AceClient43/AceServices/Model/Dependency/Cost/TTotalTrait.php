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
 * Trait for 外税対象額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TTotalTrait
{
    /** @var ?float 外税対象額 */
    protected ?float $ttotal = null;

    /**
     * {@inheritDoc}
     */
    public function getTtotal(): ?float
    {
        return $this->ttotal;
    }

    /**
     * {@inheritDoc}
     */
    public function setTtotal(?string $ttotal)
    {
        $this->ttotal = NumberConverter::stringWithCommaToFloat($ttotal);

        return $this;
    }
}
