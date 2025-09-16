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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Money;

/**
 * Interface for Has 税込み金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTInMoneyInterface
{
    /**
     * Get 税込み金額
     *
     * @return float|null
     */
    public function getTinmoney(): ?float;

    /**
     * Set 税込み金額
     *
     * @param string|null $tinmoney
     *
     * @return $this
     */
    public function setTinmoney(?string $tinmoney);
}
