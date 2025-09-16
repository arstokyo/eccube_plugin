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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Card;

/**
 * Interface for Has カード枝番
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasCedaInterface
{
    /**
     * Get カード枝番
     *
     * @return string|null
     */
    public function getCeda(): ?string;

    /**
     * Set カード枝番
     *
     * @param string|null $ceda
     *
     * @return $this
     */
    public function setCeda(?string $ceda);
}
