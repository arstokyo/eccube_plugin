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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person;

/**
 * Interface for Person Level 3
 *
 * @author Ars-Thong <v.t.nguyen@ar-sytem.co.jp>
 */
interface PersonLevel3Interface
{
    /**
     * Get 地域コード.
     *
     * @return ?string The area.
     */
    public function getArea(): ?string;

    /**
     * Set 地域コード.
     *
     * @param ?string $area
     *
     * @return $this
     */
    public function setArea(?string $area);

    /**
     * Get カスタマーコード.
     *
     * @return ?string The Cbar.
     */
    public function getCbar(): ?string;

    /**
     * Set カスタマーコード.
     *
     * @param ?string $cbar
     *
     * @return $this
     */
    public function setCbar(?string $cbar);
}
