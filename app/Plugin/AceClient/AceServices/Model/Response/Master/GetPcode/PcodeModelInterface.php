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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetPcode;

use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for PcodeModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface PcodeModelInterface extends NoCategory\HasCodeInterface, NoCategory\HasNameInterface
{
    /**
     * Get 入金予定方法の通販プロ上の説明
     *
     * @return ?string
     */
    public function getPcodeSyurui(): ?string;

    /**
     * Set 入金予定方法の通販プロ上の説明
     *
     * @param ?string $pcodeSyurui
     *
     * @return $this
     */
    public function setPcodeSyurui(?string $pcodeSyurui);

    /**
     * Get Web公開区分
     *
     * @return ?string
     */
    public function getMemo(): ?string;

    /**
     * Set Web公開区分
     *
     * @param ?string $memo
     *
     * @return $this
     */
    public function setMemo(?string $memo);
}
