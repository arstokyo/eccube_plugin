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
 * Interface for Has 名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasNameInterface
{
    /**
     * Get 名称
     *
     * @return ?string
     */
    public function getName(): ?string;

    /**
     * Set 名称
     *
     * @param ?string $name
     *
     * @return $this
     */
    public function setName(?string $name);
}
