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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Trait for 商品名
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait GNameTrait
{
    /** @var ?string 商品名 */
    protected ?string $gname = null;

    /**
     * {@inheritDoc}
     */
    public function getGname(): ?string
    {
        return $this->gname;
    }

    /**
     * {@inheritDoc}
     */
    public function setGname(?string $gname)
    {
        $this->gname = $gname;

        return $this;
    }
}
