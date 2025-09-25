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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Trait for Betu
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
trait BetuTrait
{
    /** @var ?int 住所区分 */
    protected ?int $betu = null;

    /**
     * {@inheritDoc}
     */
    public function getBetu(): ?int
    {
        return $this->betu;
    }

    /**
     * {@inheritDoc}
     */
    public function setBetu(?int $betu)
    {
        $this->betu = $betu;

        return $this;
    }
}
