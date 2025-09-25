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
 * Interface for Has Web上での注文番号
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasWebOrderNoInterface
{
    /**
     * Get Web上での注文番号
     *
     * @return ?string
     */
    public function getWeborderno(): ?string;

    /**
     * Set Web上での注文番号
     *
     * @param ?string $weborderno
     *
     * @return $this
     */
    public function setWeborderno(?string $weborderno);
}
