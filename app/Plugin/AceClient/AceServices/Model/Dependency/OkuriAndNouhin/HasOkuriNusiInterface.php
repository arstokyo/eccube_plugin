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
 * Interface for Has 送り主
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasOkuriNusiInterface
{
    /**
     * Get 送り主
     *
     * @return ?string
     */
    public function getOkurinusi(): ?string;

    /**
     * Set 送り主
     *
     * @param ?string $okurinusi
     *
     * @return $this
     */
    public function setOkurinusi(?string $okurinusi);
}
