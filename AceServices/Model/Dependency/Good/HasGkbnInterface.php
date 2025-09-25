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
 * Interface for Has 商品区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasGkbnInterface
{
    /**
     * Get 商品区分
     *
     * @return int|null
     */
    public function getGkbn(): ?int;

    /**
     * Set 商品区分
     *
     * @param int|null $gkbn
     *
     * @return $this
     */
    public function setGkbn(?int $gkbn);
}
