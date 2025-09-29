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
 * Interface for Has 伝票残高
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasZandakaInterface
{
    /**
     * Get 伝票残高
     *
     * @return ?float
     */
    public function getZandaka(): ?float;

    /**
     * Set 伝票残高
     *
     * @param string|null $zandaka
     *
     * @return $this
     */
    public function setZandaka(?string $zandaka);
}
