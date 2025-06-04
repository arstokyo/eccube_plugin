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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Denpyo;

/**
 * Interface for Has 受注方法コード
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasJcodeInterface
{
    /**
     * Get 受注方法コード
     *
     * @return ?int
     */
    public function getJcode(): ?int;

    /**
     * Set 受注方法コード
     *
     * @param ?int $jcode
     *
     * @return $this
     */
    public function setJcode(?int $jcode);
}
