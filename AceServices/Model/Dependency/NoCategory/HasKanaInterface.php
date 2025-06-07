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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Has フリガナ
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasKanaInterface
{
    /**
     * Get フリガナ
     */
    public function getKana(): ?string;

    /**
     * Set フリガナ
     *
     * @param ?string $kana
     *
     * @return $this
     */
    public function setKana(?string $kana);

    /**
     * Get フリガナ1
     *
     * @return string|null
     */
    public function getKana1(): ?string;

    /**
     * Get フリガナ2
     *
     * @return string|null
     */
    public function getKana2(): ?string;
}
