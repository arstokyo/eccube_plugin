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
 * Interface for Has 請求先コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasIcodeInterface
{
    /**
     * Get 請求先コード
     *
     * @return ?string
     */
    public function getIcode(): ?string;

    /**
     * Set 請求先コード
     *
     * @param ?string $icode
     *
     * @return $this
     */
    public function setIcode(?string $icode);
}
