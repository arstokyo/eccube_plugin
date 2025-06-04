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
 * Trait for 商品 略名
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait SubNameTrait
{
    /** @var ?string 商品 略名 */
    protected ?string $subName = null;

    /**
     * {@inheritDoc}
     */
    public function getSubName(): ?string
    {
        return $this->subName;
    }

    /**
     * {@inheritDoc}
     */
    public function setSubName(?string $subName)
    {
        $this->subName = $subName;

        return $this;
    }
}
