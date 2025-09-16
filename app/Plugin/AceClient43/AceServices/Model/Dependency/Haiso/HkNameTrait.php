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
 * Trait for 時間指定名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
trait HkNameTrait
{
    /** @var ?string 時間指定名称 */
    protected ?string $hkname = null;

    /**
     * {@inheritDoc}
     */
    public function getHkname(): ?string
    {
        return $this->hkname;
    }

    /**
     * {@inheritDoc}
     */
    public function setHkname(?string $hkname)
    {
        $this->hkname = $hkname;

        return $this;
    }
}
