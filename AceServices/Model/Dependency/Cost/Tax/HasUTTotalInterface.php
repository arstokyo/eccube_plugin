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
 * Interface for Has 内税対象額（税込）
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasUTTotalInterface
{
    /**
     * Get 内税対象額（税込）
     *
     * @return float|null
     */
    public function getUttotal(): ?float;

    /**
     * Set 内税対象額（税込）
     *
     * @param string|null $uttotal
     *
     * @return $this
     */
    public function setUttotal(?string $uttotal);
}
