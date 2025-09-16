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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tanka;

/**
 * Interface for Has 消費税単価
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxTankaInterface
{
    /**
     * Get 消費税単価
     *
     * @return float|null
     */
    public function getTaxtanka(): ?float;

    /**
     * Set 消費税単価
     *
     * @param string|null $taxtanka
     *
     * @return $this
     */
    public function setTaxtanka(?string $taxtanka);
}
