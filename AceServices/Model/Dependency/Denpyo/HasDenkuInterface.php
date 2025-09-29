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
 * Interface for Has 伝票種類
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasDenkuInterface
{
    /**
     * Get 伝票種類
     *
     * @return string|int|null 伝票種類
     */
    public function getDenku(): ?string;

    /**
     * Set 伝票種類
     *
     * @param string|int|null $denku 伝票種類
     *
     * @return $this
     */
    public function setDenku(?string $denku);
}
