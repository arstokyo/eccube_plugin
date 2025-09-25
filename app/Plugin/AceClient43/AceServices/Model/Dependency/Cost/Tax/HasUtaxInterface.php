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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 内消費税
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasUtaxInterface
{
    /**
     * Get 内消費税
     *
     * @return ?float
     */
    public function getUtax(): ?float;

    /**
     * Set 内消費税
     *
     * @param ?string $utax
     *
     * @return $this
     */
    public function setUtax(?string $utax);
}
