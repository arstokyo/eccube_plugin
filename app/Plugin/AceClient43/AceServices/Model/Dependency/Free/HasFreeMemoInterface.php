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

namespace Plugin\AceClient43\AceServices\Model\Dependency\Free;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface For HasFreeMemo
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface HasFreeMemoInterface extends NoCategory\HasKubunInterface
{
    /**
     * Get フリーマスタID
     *
     * @return ?string
     */
    public function getFoid(): ?string;

    /**
     * Set フリーマスタID
     *
     * @param ?string $foid
     *
     * @return $this
     */
    public function setFoid(?string $foid);

    /**
     * Get メモ
     *
     * @return ?string
     */
    public function getMemo(): ?string;

    /**
     * Set メモ
     *
     * @param ?string $memo
     *
     * @return $this
     */
    public function setMemo(?string $memo);
}
