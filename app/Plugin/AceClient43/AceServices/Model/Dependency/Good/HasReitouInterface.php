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
 * Interface for Has 冷凍
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasReitouInterface
{
    /**
     * Get 冷凍
     *
     * @return int|null
     */
    public function getReitou(): ?int;

    /**
     * Set 冷凍
     *
     * @param int|null $reitou
     *
     * @return $this
     */
    public function setReitou(?int $reitou);
}
