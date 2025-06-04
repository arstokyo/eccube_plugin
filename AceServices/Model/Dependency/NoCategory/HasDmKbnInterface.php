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

namespace Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for Hs DM区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasDmKbnInterface
{
    /**
     * Get DM区分
     *
     * @return ?int
     */
    public function getDmkbn(): ?int;

    /**
     * Set DM区分
     *
     * @param ?int $dmkbn
     *
     * @return $this
     */
    public function setDmkbn(?int $dmkbn);
}
