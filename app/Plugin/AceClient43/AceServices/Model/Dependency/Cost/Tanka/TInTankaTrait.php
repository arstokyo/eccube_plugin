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
 * Trait for 税込み単価
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait TInTankaTrait
{
    /** @var ?float 税込み単価 */
    protected ?float $tintanka = null;

    /**
     * {@inheritDoc}
     */
    public function getTintanka(): ?float
    {
        return $this->tintanka;
    }

    /**
     * {@inheritDoc}
     */
    public function setTintanka(?string $tintanka)
    {
        $this->tintanka = NumberConverter::stringWithCommaToFloat($tintanka);

        return $this;
    }
}
