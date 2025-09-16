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
 * Trait for 通販プロID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait IdTrait
{
    /** @var ?int 通販プロID */
    protected ?int $id = null;

    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setId(?int $id)
    {
        $this->id = $id;

        return $this;
    }
}
