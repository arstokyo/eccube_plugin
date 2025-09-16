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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Haiso;

/**
 * Interface for Has 配送会社名称
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasOnameInterface
{
    /**
     * Get 配送会社名称
     *
     * @return ?string
     */
    public function getOname(): ?string;

    /**
     * Set 配送会社名称
     *
     * @param ?string $oname
     *
     * @return $this
     */
    public function setOname(?string $oname);
}
