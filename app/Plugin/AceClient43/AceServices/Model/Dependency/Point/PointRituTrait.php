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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Point;

use Plugin\AceClient43\Util\Converter\NumberConverter;

/**
 * Trait for ポイント掛率
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointRituTrait
{
    /** @var ?float ポイント掛率 */
    protected ?float $pointritu = null;

    /**
     * {@inheritDoc}
     */
    public function getPointritu(): ?float
    {
        return $this->pointRitu;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointritu(?string $pointritu)
    {
        $this->pointRitu = NumberConverter::stringWithCommaToFloat($pointritu);

        return $this;
    }
}
