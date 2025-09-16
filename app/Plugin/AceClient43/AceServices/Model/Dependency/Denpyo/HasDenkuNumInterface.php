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
 * Interface for Has 伝票フラグ
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasDenkuNumInterface
{
    /**
     * Get 伝票フラグ
     *
     * @return ?int
     */
    public function getDenkuNum(): ?int;

    /**
     * Set 伝票フラグ
     *
     * @param ?int $denkuNum
     *
     * @return $this
     */
    public function setDenkuNum(?int $denkuNum);
}
