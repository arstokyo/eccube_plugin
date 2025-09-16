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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Shukka;

/**
 * Interface for 出荷対象区分
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasSKbnInterface
{
    /**
     * Get 出荷対象区分
     *
     * @return ?int
     */
    public function getSkbn(): ?int;

    /**
     * Set 出荷対象区分
     *
     * @param ?int $skbn
     *
     * @return $this
     */
    public function setSkbn(?int $skbn);
}
