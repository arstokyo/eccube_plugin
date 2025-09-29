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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Cost\Tesuu;

/**
 * Interface for Has 手数料合計
 *
 * @author Ars-Thong <v.t.nguyen@ar-system.co.jp>
 */
interface HasTesuuZnInterface
{
    /**
     * Get 手数料合計
     *
     * @return float|null
     */
    public function getTesuuzn(): ?float;

    /**
     * Set 手数料合計
     *
     * @param string|null $tesuuzn
     *
     * @return $this
     */
    public function setTesuuzn(?string $tesuuzn);
}
