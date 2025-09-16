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
 * Trait for 配送会社名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HnameTrait
{
    /** @var ?string 配送会社名称 */
    protected ?string $hname = null;

    /**
     * {@inheritDoc}
     */
    public function getHname(): ?string
    {
        return $this->hname;
    }

    /**
     * {@inheritDoc}
     */
    public function setHname(?string $hname)
    {
        $this->hname = $hname;

        return $this;
    }
}
