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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Baitai;

/**
 * Interface for Has 媒体コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBcodeInterface
{
    /**
     * Get 媒体コード
     *
     * @return ?string
     */
    public function getBcode(): ?string;

    /**
     * Set 媒体コード
     *
     * @param ?string $bcode
     *
     * @return $this
     */
    public function setBcode(?string $bcode);
}
