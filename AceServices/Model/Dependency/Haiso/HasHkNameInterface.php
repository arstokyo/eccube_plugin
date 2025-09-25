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
 * Interface for Has 時間指定名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasHkNameInterface
{
    /**
     * Get 時間指定名称
     *
     * @return ?string
     */
    public function getHkname(): ?string;

    /**
     * Set 時間指定名称
     *
     * @param ?string $hkname
     *
     * @return $this
     */
    public function setHkname(?string $hkname);
}
