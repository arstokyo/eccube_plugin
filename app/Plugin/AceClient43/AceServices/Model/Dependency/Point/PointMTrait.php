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

/**
 * Trait for 使用ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PointMTrait
{
    /** @var ?int 使用ポイント */
    protected ?int $pointm = null;

    /**
     * {@inheritDoc}
     */
    public function getPointm(): ?int
    {
        return $this->pointm;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointm(?int $pointm)
    {
        $this->pointm = $pointm;

        return $this;
    }
}
