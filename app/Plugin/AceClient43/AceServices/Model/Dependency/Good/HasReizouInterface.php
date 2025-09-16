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
 * Interface for Has 冷蔵
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasReizouInterface
{
    /**
     * Get 冷蔵
     *
     * @return int|null
     */
    public function getReizou(): ?int;

    /**
     * Set 冷蔵
     *
     * @param int|null $reizou
     *
     * @return $this
     */
    public function setReizou(?int $reizou);
}
