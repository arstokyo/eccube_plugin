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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for Has 消費税単価
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TaxTankaTrait
{
    /** @var ?float 消費税単価 */
    protected ?float $taxtanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTaxtanka(): ?float
    {
        return $this->taxtanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTaxtanka(?string $taxtanka)
    {
        $this->taxtanka = NumberConverter::stringWithCommaToFloat($taxtanka);

        return $this;
    }
}
