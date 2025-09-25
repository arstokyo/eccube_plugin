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
 * Interface for Has 受注方法名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasJnameInterface
{
    /**
     * Get 受注方法名称
     *
     * @return ?string
     */
    public function getJname(): ?string;

    /**
     * Set 受注方法名称
     *
     * @param ?string $jname
     *
     * @return $this
     */
    public function setJname(?string $jname);
}
