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
 * Interface for Has 税区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTaxKbnInterface
{
    /**
     * Get 税区分
     *
     * @return int|null
     */
    public function getTaxkbn(): ?int;

    /**
     * Set 税区分
     *
     * @param int|null $taxkbn
     *
     * @return $this
     */
    public function setTaxkbn(?int $taxkbn);
}
