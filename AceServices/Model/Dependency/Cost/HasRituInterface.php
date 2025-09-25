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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost;

/**
 * Interface for 掛け率
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasRituInterface
{
    /**
     * Get 掛け率
     *
     * @return float|null
     */
    public function getRitu(): ?float;

    /**
     * Set 掛け率
     *
     * @param string|null $ritu
     *
     * @return $this
     */
    public function setRitu(?string $ritu);
}
