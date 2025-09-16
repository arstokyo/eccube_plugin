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

namespace Plugin\AceClient43\AceServices\Model\Dependency\OkuriAndNouhin;

/**
 * Interface for Has 荷物個数
 *
 * @author Ars-Phuoc <v.t.nguyen@ar-system.co.jp>
 */
interface HasOkuriSuuInterface
{
    /**
     * Get 荷物個数
     *
     * @return ?int
     */
    public function getOkurisuu(): ?int;

    /**
     * Set 荷物個数
     *
     * @param ?int $okurisuu
     *
     * @return $this
     */
    public function setOkurisuu(?int $okurisuu);
}
