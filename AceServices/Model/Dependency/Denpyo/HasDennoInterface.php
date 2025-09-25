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
 * Interface for Has 伝票番号
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasDennoInterface
{
    /**
     * Get 伝票番号.
     *
     * @return ?int
     */
    public function getDenno(): ?int;

    /**
     * Set 伝票番号.
     *
     * @param ?int $denno 伝票番号
     *
     * @return $this
     */
    public function setDenno(?int $denno);
}
