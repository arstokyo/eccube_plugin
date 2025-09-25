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
 * Interface for Has 媒体管理コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasBkCodeInterface
{
    /**
     * Get 媒体管理コード
     *
     * @return ?string
     */
    public function getBkcode(): ?string;

    /**
     * Set 媒体管理コード
     *
     * @param ?string $bkcode
     *
     * @return $this
     */
    public function setBkcode(?string $bkcode);
}
