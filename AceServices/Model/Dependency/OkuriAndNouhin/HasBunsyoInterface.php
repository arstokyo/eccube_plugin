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

namespace Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for 文章指定コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBunsyoInterface
{
    /**
     * Get 文章指定コード
     *
     * @return ?int
     */
    public function getBunsyo(): ?int;

    /**
     * Set 文章指定コード
     *
     * @param ?int $bunsyo
     *
     * @return $this
     */
    public function setBunsyo(?int $bunsyo);
}
