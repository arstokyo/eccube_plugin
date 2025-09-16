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
 * Trait for 単価
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
trait TankaTrait
{
    /** @var float 単価 */
    protected ?float $tanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTanka(): ?float
    {
        return $this->tanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTanka(?string $tanka)
    {
        $this->tanka = NumberConverter::stringWithCommaToFloat($tanka);

        return $this;
    }
}
