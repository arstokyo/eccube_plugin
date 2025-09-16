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
 * Trait for 加算ポイント
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait PointPTrait
{
    /** @var ?int 加算ポイント */
    protected ?int $pointp = null;

    /**
     * {@inheritDoc}
     */
    public function getPointp(): ?int
    {
        return $this->pointp;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointp(?int $pointp)
    {
        $this->pointp = $pointp;

        return $this;
    }
}
