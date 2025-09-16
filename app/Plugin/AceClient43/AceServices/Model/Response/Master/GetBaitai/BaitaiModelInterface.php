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

namespace Plugin\AceClient43\AceServices\Model\Response\Master\GetBaitai;

use Plugin\AceClient43\AceServices\Model\Dependency\Good;
use Plugin\AceClient43\AceServices\Model\Dependency\NoCategory;

/**
 * Interface for BaitaiModel
 *
 * @author Ars-Phuoc <m.phuoc.le@ar-system.co.jp>
 */
interface BaitaiModelInterface extends NoCategory\HasCodeInterface, NoCategory\HasNameInterface, Good\HasSubNameInterface
{
    /**
     * Get 分類コード
     *
     * @return ?string
     */
    public function getBun(): ?string;

    /**
     * Set 分類コード
     *
     * @param ?string $bun
     *
     * @return $this
     */
    public function setBun(?string $bun);

    /**
     * Get フリーコード１
     *
     * @return ?string
     */
    public function getFcode1(): ?string;

    /**
     * Set フリーコード１
     *
     * @param ?string $fcode1
     *
     * @return $this
     */
    public function setFcode1(?string $fcode1);

    /**
     * Get フリーコード２
     *
     * @return ?string
     */
    public function getFcode2(): ?string;

    /**
     * Set フリーコード２
     *
     * @param ?string $fcode2
     *
     * @return $this
     */
    public function setFcode2(?string $fcode2);

    /**
     * Get 表示／非表示
     *
     * @return ?int
     */
    public function getDispkbn(): ?int;

    /**
     * Set 表示／非表示
     *
     * @param ?int $dispkbn
     *
     * @return $this
     */
    public function setDispkbn(?int $dispkbn);
}
