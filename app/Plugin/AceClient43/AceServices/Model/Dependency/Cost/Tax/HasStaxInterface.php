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
 * Interface for Has 消費税額(外税)
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasStaxInterface
{
    /**
     * Get 消費税額(外税)
     *
     * @return ?float
     */
    public function getStax(): ?float;

    /**
     * Set 消費税額(外税)
     *
     * @param ?string $stax
     *
     * @return $this
     */
    public function setStax(?string $stax);
}
