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
 * Interface for Has 金額
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasMoneyInterface
{
    /**
     * Get 金額
     *
     * @return float|null
     */
    public function getMoney(): ?float;

    /**
     * Set 金額
     *
     * @param string|null $money
     *
     * @return $this
     */
    public function setMoney(?string $money);
}
