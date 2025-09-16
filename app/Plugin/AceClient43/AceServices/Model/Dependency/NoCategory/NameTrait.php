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
 * Trait for 名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait NameTrait
{
    /** @var ?string 名称 */
    protected ?string $name = null;

    /**
     * {@inheritDoc}
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName(?string $name)
    {
        $this->name = $name;

        return $this;
    }
}
