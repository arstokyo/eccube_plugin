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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;

/**
 * Interface for 納品先顧客コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasNcodeInterface
{
    /**
     * Get 納品先顧客コード
     *
     * @return ?string
     */
    public function getNcode(): ?string;

    /**
     * Set 納品先顧客コード
     *
     * @param string|null $ncode
     *
     * @return $this
     */
    public function setNcode(?string $ncode);
}
