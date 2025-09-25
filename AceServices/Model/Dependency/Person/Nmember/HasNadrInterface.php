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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Person\Nmember;

/**
 * Interface for 納品先住所枝番
 *
 * @author Ars-Thong <v.t.nguyen@ar-sysytem.co.jp>
 */
interface HasNadrInterface
{
    /**
     * Get 納品先住所枝番
     *
     * @return ?string
     */
    public function getNadr(): ?string;

    /**
     * Set 納品先住所枝番
     *
     * @param string|null $nadr
     *
     * @return $this
     */
    public function setNadr(?string $nadr);
}
