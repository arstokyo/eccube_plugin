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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Trait for 配送伝票略称
 *
 * @author Ars-PhuongAnh <a-bui@ar-system.co.jp>
 */
trait OsubnameTrait
{
    /** @var ?string 配送伝票略称 */
    protected ?string $osubname = null;

    /**
     * {@inheritDoc}
     */
    public function getOsubname(): ?string
    {
        return $this->osubname;
    }

    /**
     * {@inheritDoc}
     */
    public function setOsubname(?string $osubname)
    {
        $this->osubname = $osubname;

        return $this;
    }
}
