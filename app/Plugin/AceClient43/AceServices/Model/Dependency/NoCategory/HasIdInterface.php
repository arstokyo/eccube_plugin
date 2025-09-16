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
 * Interface for Has 通販AceSystemID
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasIdInterface
{
    /**
     * Get 通販AceSystemID
     *
     * @return ?int
     */
    public function getId(): ?int;

    /**
     * Set 通販AceSystemID
     *
     * @param ?int $id
     *
     * @return $this
     */
    public function setId(?int $id);
}
