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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Bumon;

/**
 * Trait for 部門
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BumonTrait
{
    /** @var ?string 部門 */
    protected ?string $bumon = null;

    /**
     * {@inheritDoc}
     */
    public function getBumon(): ?string
    {
        return $this->bumon;
    }

    /**
     * {@inheritDoc}
     */
    public function setBumon(?string $bumon)
    {
        $this->bumon = $bumon;

        return $this;
    }
}
