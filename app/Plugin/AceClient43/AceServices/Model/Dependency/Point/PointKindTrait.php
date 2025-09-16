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
 * Trait for ポイント種類
 *
 * @author kmorino
 */
trait PointKindTrait
{
    /** @var ?int ポイント */
    protected ?int $pointkind = null;

    /**
     * {@inheritDoc}
     */
    public function getPointkind(): ?int
    {
        return $this->pointkind;
    }

    /**
     * {@inheritDoc}
     */
    public function setPointkind(?int $pointkind)
    {
        $this->pointkind = $pointkind;

        return $this;
    }
}
