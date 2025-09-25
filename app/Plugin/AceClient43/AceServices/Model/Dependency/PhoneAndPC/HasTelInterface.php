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

namespace Plugin\AceClient43\AceServices\Model\Dependency\PhoneAndPC;

/**
 * Interface for Has 電話
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTelInterface
{
    /**
     * Get 電話
     *
     * @return string|null
     */
    public function getTel(): ?string;

    /**
     * Set 電話
     *
     * @param string|null $tel
     *
     * @return $this
     */
    public function setTel(?string $tel);
}
