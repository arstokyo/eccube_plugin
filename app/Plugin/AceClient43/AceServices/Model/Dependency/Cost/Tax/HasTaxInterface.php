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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tax;

/**
 * Interface for Has 外税消費税
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxInterface
{
    /**
     * Get 外税消費税
     *
     * @return float|null
     */
    public function getTax(): ?float;

    /**
     * Set 外税消費税
     *
     * @param string|null $tax
     *
     * @return $this
     */
    public function setTax(?string $tax);
}
