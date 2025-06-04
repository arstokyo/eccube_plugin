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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 行番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasLineInterface
{
    /**
     * Get 行番号
     *
     * @return ?int
     */
    public function getLine(): ?int;

    /**
     * Set 行番号
     *
     * @param ?int $line
     *
     * @return $this
     */
    public function setLine(?int $line);
}
