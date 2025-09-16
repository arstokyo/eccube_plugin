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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Good;

/**
 * Interface for Has 常温
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasJyouonInterface
{
    /**
     * Get 常温
     *
     * @return int|null
     */
    public function getJyouon(): ?int;

    /**
     * Set 常温
     *
     * @param int|null $jyouon
     *
     * @return $this
     */
    public function setJyouon(?int $jyouon);
}
