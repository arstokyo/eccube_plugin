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
 * Trait for ポイント使用上限金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PointMaxTrait
{
    /** @var ?int ポイント使用上限金額 */
    protected ?int $pointmax = null;

    /**
     * {@inheritDoc}
     */
    public function getPointmax(): ?int
    {
        return $this->pointmax;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointmax(?int $pointmax)
    {
        $this->pointmax = $pointmax;

        return $this;
    }
}
