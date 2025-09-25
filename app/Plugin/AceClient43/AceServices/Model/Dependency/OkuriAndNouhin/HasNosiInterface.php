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
 * Interface for Has のし
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasNosiInterface
{
    /**
     * Get のし
     *
     * @return ?string
     */
    public function getNosi(): ?string;

    /**
     * Set のし
     *
     * @param ?string $nosi
     *
     * @return $this
     */
    public function setNosi(?string $nosi);
}
