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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

/**
 * Trait for PersonLevel3
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait PersonLevel3Trait
{
    /** @var ?string 地域コード */
    protected ?string $area = null;

    /** @var ?string カスタマーコード */
    protected ?string $cbar = null;

    /**
     * {@inheritDoc}
     */
    public function getArea(): ?string
    {
        return $this->area;
    }

    /**
     * {@inheritDoc}
     */
    public function setArea(?string $area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCbar(): ?string
    {
        return $this->cbar;
    }

    /**
     * {@inheritDoc}
     */
    public function setCbar(?string $cbar)
    {
        $this->cbar = $cbar;

        return $this;
    }
}
