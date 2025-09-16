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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has 顧客コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCodeInterface
{
    /**
     * Get 顧客コード
     *
     * @return ?string
     */
    public function getCode(): ?string;

    /**
     * Set 顧客コード
     *
     * @param ?string $code
     *
     * @return $this
     */
    public function setCode(?string $code);
}
