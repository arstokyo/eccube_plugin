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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Zaiko;

/**
 * Interface for 在庫数
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasZaikoInterface
{
    /**
     * Get 在庫数
     *
     * @return int|null
     */
    public function getZaiko(): ?int;

    /**
     * Set 在庫数
     *
     * @param int|null $zaiko
     *
     * @return $this
     */
    public function setZaiko(?int $zaiko);

    public function getPureZaiko(): ?int;
}
