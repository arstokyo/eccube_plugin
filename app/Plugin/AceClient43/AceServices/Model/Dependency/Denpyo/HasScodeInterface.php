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
 * Interface for Has 請求先顧客コード
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasScodeInterface
{
    /**
     * Get 請求先顧客コード
     *
     * @return ?string
     */
    public function getScode(): ?string;

    /**
     * Set 請求先顧客コード
     *
     * @param ?string $scode
     *
     * @return $this
     */
    public function setScode(?string $scode);
}
