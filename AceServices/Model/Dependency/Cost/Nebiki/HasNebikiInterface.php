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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Nebiki;

/**
 * Interface for Has 値引額
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasNebikiInterface
{
    /**
     * Get 値引額
     *
     * @return ?float
     */
    public function getNebiki(): ?float;

    /**
     * Set 値引額
     *
     * @param ?string $nebiki
     *
     * @return $this
     */
    public function setNebiki(?string $nebiki);
}
